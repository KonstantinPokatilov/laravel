<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QueryBuilders\UsersQueryBuilder;
use App\Models\User as UsersModel;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Users\EditRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index(): View
    {   
        $usersModel = new UsersModel();
        return \view('admin.users.index', [
            'usersList' => $usersModel->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UsersModel  $user
     * @return Illuminate\Contracts\View\View
     */
    public function edit(UsersModel $user): View
    {   
        return \view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Users\EditRequest  $request
     * @param  App\Models\User as UsersModel $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, UsersModel $user)
    {
        $user->fill($request->validated());
        $user->is_admin = $request->get('is_admin');
        if ($user->save()) {
            return \redirect()->route('admin.users.index')->with('success', 'Пользователь обновлен');
        }
        return \back()->with('error', 'Не удалось сохранить данные');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
