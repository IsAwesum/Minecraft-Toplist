<?php


Route::get('(:bundle)/login', function()
{
	return View::make('user::pages.login');
});
Route::get('(:bundle)/markdown', function()
{
    return View::make('user::pages.markdown');
});

Route::get('(:bundle)/logout', function() 
{
    Auth::logout();
    return Redirect::to('user/login');
});

Route::get('(:bundle)/dashboard', array('before' => 'auth', 'do' => function()
{

	return View::make('user::pages.dashboard');
}));

Route::get('(:bundle)/add', array('before' => 'auth', 'do' => function()
{
    return View::make('user::pages.add');
}));
Route::get('(:bundle)/edit', array('before' => 'auth', 'do' => function()
{
    $data = Website::where('owner','=',Auth::user()->id)->first();
    Session::flash('idresult', $data->id);
    return View::make('user::pages.edit')->with('data', $data);
}));
Route::post('(:bundle)/login', function()
{
	// get POST data
    $userdata = array(
        'username'      => Input::get('username'),
        'password'      => Input::get('password')
    );

    if ( Auth::attempt($userdata) )
    {
        // we are now logged in, go to home
        return Redirect::to('user/dashboard');
    }
    else
    {
        // auth failure! lets go back to the login
        return Redirect::to('user/login')
            ->with('login_errors', true);
        // pass any error notification you want
        // i like to do it this way :)
    }

});

Route::post('(:bundle)/add', array('before' => 'auth', 'do' => function()
{
    $name = Input::get('name');
    $ip = Input::get('ip');
    $body = Input::get('body');

    $rules = array(
        'name' => 'required',
        'ip' => 'required|unique:websites,ip',
        'body' => 'required',
        );
        // create a new validator object
        $v = Validator::make(Input::all(), $rules);

        // run the validation
        if ($v->fails())
        {
            return Redirect::to('user/add')->with_errors($v->errors);
        }
        else
        {
            $website = new Website;
            $website->name = Input::get('name');
            $website->ip = Input::get('ip');
            $website->body = Input::get('body');
            $website->owner = Auth::user()->id;
            $website->votes = 2;
            $website->premium = 0;
            $website->save();
        }    
}));

Route::post('(:bundle)/edit', array('before' => 'auth', 'do' => function()
{
    $name = Input::get('name');
    $ip = Input::get('ip');
    $body = Input::get('body');
    $result = Session::get('idresult');
    $rules = array(
        'name' => 'required',
        'ip' => 'required',
        'body' => 'required',
        );
        // create a new validator object
        $v = Validator::make(Input::all(), $rules);

        // run the validation
        if ($v->fails())
        {
            return Redirect::to('user/edit')->with_errors($v->errors);
        }
        else
        {
            $website = Website::find($result);
            $website->name = Input::get('name');
            $website->ip = Input::get('ip');
            $website->body = Input::get('body');
            $website->save();
        }    
}));