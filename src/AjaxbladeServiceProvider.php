<?php namespace Ghanem\Ajaxblade;

use Illuminate\Support\ServiceProvider;
use Blade;

class AjaxbladeServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    $this->publishes([
        __DIR__.'/../assets/ajaxblade.js' => public_path('vendor/ajaxblade/ajaxblade.js'),
    ], 'public');

        Blade::directive('ajaxpagination', function ($expression) {
            return "<?php echo with($expression)->render() ?>
                    <script>
                        $(document).ready(function(){
                            $('ul.pagination:visible:first').hide();
                            $('div.abs').jscroll({
                                debug: true,
                                autoTrigger: true,
                                nextSelector: '.pagination li.active + li a',
                                contentSelector: 'div.abs',
                                callback: function() {
                                    $('ul.pagination:visible:first').hide();
                                }
                            });
                        });
                    </script>
            ";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

}
