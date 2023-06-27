<?php

namespace App\Providers;

use App\Modules\Achievments\Db\AchievementsDb;
use App\Modules\Achievments\Db\IAchievementsDb;
use App\Modules\Game\Db\GameDb;
use App\Modules\Game\Db\GamePlayersDb;
use App\Modules\Game\Db\IGameDb;
use App\Modules\Game\Db\IGamePlayersDb;
use App\Modules\Game\Db\IInfoDb;
use App\Modules\Game\Db\InfoDb;
use App\Modules\Game\Db\IPriceDb;
use App\Modules\Game\Db\IRuleDb;
use App\Modules\Game\Db\PriceDb;
use App\Modules\Game\Db\RuleDb;
use App\Modules\Player\Db\IPlayerDb;
use App\Modules\Player\Db\IPlayerPriceDb;
use App\Modules\Player\Db\PlayerDb;
use App\Modules\Player\Db\PlayerPriceDb;
use App\Modules\Subscribers\Db\EmailsDb;
use App\Modules\Subscribers\Db\IEmailsDb;
use App\Modules\Team\Db\ITeamDb;
use App\Modules\Team\Db\TeamDb;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IInfoDb::class, InfoDb::class);
        $this->app->bind(IPriceDb::class, PriceDb::class);
        $this->app->bind(IRuleDb::class, RuleDb::class);
        $this->app->bind(IPlayerPriceDb::class, PlayerPriceDb::class);
        $this->app->bind(IPlayerDb::class, PlayerDb::class);
        $this->app->bind(IGameDb::class, GameDb::class);
        $this->app->bind(IGamePlayersDb::class, GamePlayersDb::class);
        $this->app->bind(IEmailsDb::class, EmailsDb::class);
        $this->app->bind(ITeamDb::class, TeamDb::class);
        $this->app->bind(IAchievementsDb::class, AchievementsDb::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
