<?php declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;

class ParserService implements Parser 
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        
        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],

        ]);
        
        $e = \explode('/', $this->link);
        $fileName = end($e);
        $jsonEncode = json_encode($data);
        
        Storage::append('news/' . $fileName, $jsonEncode);
        
        // return $xml->parse([
        //     'Valute' => [
        //         'uses' => 'Valute[Name,CharCode,Value]'
        //     ]
        // ]);
    }
}