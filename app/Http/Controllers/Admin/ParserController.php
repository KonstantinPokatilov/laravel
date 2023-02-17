<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Services\Contracts\Parser;
use App\Models\Currency;
use App\Models\Sources;
use App\Jobs\JobNewsParsing;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $sourcesModel = new Sources();
        $sources = $sourcesModel->get('link');
        
        foreach($sources as $key => $value) {
            \dispatch(new JobNewsParsing($value->link));
        }

        return 'ok';

        // $load = $parser->setLink('https://www.cbr.ru/scripts/XML_daily_eng.asp')->getParseData();
        // Currency::truncate();
        // foreach($load['Valute'] as $key => $value) {
        //     $save = Currency::create($value);
        // }
    
    }
}
