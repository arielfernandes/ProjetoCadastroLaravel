<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Child;
use App\Models\User;
use League\Csv\Writer;
use Carbon\Carbon;
use \DateTime;

class RegisterController extends Controller
{
   
    public function index()
    {        
     
        $qty = 3;
        //$generate_csv = request('generate_csv');
        $search = request('search');
        $date_search_begin = \DateTime::createFromFormat('Y-m-d', request('date_search_begin'));
        $date_search_end = \DateTime::createFromFormat('Y-m-d', request('date_search_end'));
        
        $query = Register::query();

        if ($search) {
            $registers = Register::where([['nome', 'like', '%' . $search . '%']])->get();
        }else if ($date_search_begin && $date_search_end) {
            $query->whereDate('created_at', '>=', $date_search_begin);
            $query->whereDate('created_at', '<=', $date_search_end);
            $registers = $query->orderBy('nome', 'asc')->paginate($qty);
            //SELECT * FROM registers WHERE DATE(created_at) >= ? AND DATE(created_at) <= ?
        }
        else {
            $registers = Register::orderBy('nome', 'asc')->paginate($qty);
         }
 
        return view('welcome', ['registers' => $registers, 'search' => $search]);
    }

    public function create()
    {
        return view('registers.create');
    }
    public function store(Request $request)
    {

        $register = new Register;
        $child_register = new Child;

        $register->nome = $request->nome;
        $register->email = $request->email;
        $register->cpf = $request->cpf;
        $register->telefone = $request->telefone;
        $register->datanasci = $request->datanasci;


        $user = auth()->user();
        $register->user_id = $user->id;

        //Salvando dados no banco
        $register->save();

        //dd($request->child_);
        if (!$request->child_) {
            $child_register->nome = $request->nome;
            $child_register->idade = $request->idade;
            $child_register->sexo = $request->sexo;

            //Relacionado usuario com tabela de filhos
            //$register_user = $register->child();
            $child_register->id_register = $register->id;

            $child_register->save();
        }





        //$child_register->save();

        return redirect('/')->with('msg', 'Cadastro realizado com sucesso!');
    }
    public function show($id)
    {

        $register = Register::findOrFail($id);

        // $children = $register->child();
        //Pegando valores da tabela child via id, refereciando a tabela mãe
        $children = Child::where('id_register', $register->id)->get()->toArray();
        // dd($children);
        return view('registers.show', ['register' => $register, 'children' => $children]);
    }

    public function destroy($id)
    {
        Register::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Cadastro Excluido com sucesso!');
    }   
    public function edit($id) {
       
        $register = Register::findOrFail($id);

       $children = $register->child();
      //Pegando valores da tabela child via id, refereciando a tabela mãe
       $children = Child::where('id_register', $register->id)->get()->toArray();
      // dd($children);
        return view('registers.edit', ['register' => $register, 'children' => $children]);
    }

    public function update(Request $request, $id){
        //$dataForm = $request->all();
        //$register = Register::find($id);
        //
        //if($register) {
        //    $register->update($dataForm);
        //  $register->child()->update($dataForm);
        //}

        Register::findOrFail($request->id)->update($request->all());


        return redirect('/')->with('msg', 'Cadastro editado com sucesso!');
    }
    public function orderby() {
      
        return redirect('/');
    }

    public function create_csv() {

        //$u = Child::find(1);
        //dd($u);

        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $users = Register::orderBy('nome', 'asc')->paginate();

        $child = Child::orderBy('id_register', 'asc')->paginate();
        foreach($users as $user){
            foreach($child as $c){
                if($c->id_register == $user->id)
                    $csv->insertOne($user->toArray());
            }
                    

           
        }
        $csv->output('usuarios_'.Carbon::now().'.csv');
    }
}
