<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Module;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){

           $modules=Module::where('parent_id',0)->get();
           // dd($modules);
            foreach ($modules as $module) {

             $module->children = Module::where('parent_id',$module->id)->where('visibility', '=', 1)->get();
         }
          // dd($menues);
            $view->with('modules',$modules);



        });
    }
}
