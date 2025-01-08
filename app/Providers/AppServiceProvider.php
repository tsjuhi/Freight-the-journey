<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  // {
  //   Vite::useStyleTagAttributes(function (?string $src, string $url, ?array $chunk, ?array $manifest) {
  //     if ($src !== null) {
  //       return [
  //         'class' => preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?core)-?.*/i", $src) ? 'template-customizer-core-css' :
  //                   (preg_match("/(resources\/assets\/vendor\/scss\/(rtl\/)?theme)-?.*/i", $src) ? 'template-customizer-theme-css' : '')
  //       ];
  //     }
  //     return [];
  //   });
  // }

{

    view()->composer('*', function ($view) {
        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);

        $verticalMemberMenuJson = file_get_contents(base_path('resources/menu/verticalMemberMenu.json'));
        $verticalMemberMenuData = json_decode($verticalMemberMenuJson);

        if (Auth::check() && Auth::user()->role_id === 1) {
            $menuData = [$verticalMenuData]; // Admin menu
        } else {
            $menuData = [$verticalMemberMenuData]; // Member menu
        }

        $view->with('menuData', $menuData);
        
    });
}

}