<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SiteTranslation;
use App\Models\FAQ;
use App\Models\Team;
use App\Models\Section;
use App\Models\Img;

class PageController
{

    public function index()
    {
        $menus = Menu::active()->sorted()->get();
        $site_translations = (object)SiteTranslation::homeTranslations()->get()->pluck('value', 'key')->toArray();
        $team = Team::team()->active()->sorted()->get();
        $mentors = Team::mentor()->active()->sorted()->get();
        $faqs = FAQ::active()->posSort()->sorted()->get();
        $sections = Section::getActiveIds();
        $imgs = Img::getMappedActive();
    
        return view('pages.main', compact('menus', 'site_translations', 'team', 'mentors', 'faqs', 'sections', 'imgs'));
    }

}
