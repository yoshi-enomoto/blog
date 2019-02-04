<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        // 独自の名前で呼び出す為の記述
        // Blade::component('components.alert3', 'aiko');
            // componentメソッドは5.6から追加されたもの。なので5.5では独自の名前での呼び出し不可

        // directiveメソッドを用いると、bladeで使用出来るディレクティブを設定可能。
        Blade::directive('aiko', function ($place) {
            return "<?php echo 'LLP20@' . $place ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
