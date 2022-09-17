<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class XmlParserService
{
    // This is PHP developer test assignment. Time: 1 hour.

    // все это самопальное, на коленке - годиться для небольших xml файлов, в реальном же проекте проще использовать готовый компонент, либо производить замеры SAX, DOM и т. п.
    // из командной строки все работает через artisan app/Console/Commands (Artisan::command и т.п.)
    // дальше комменты по-английски



    static public function parser($filename = 'data.xml'){

    // if large xml use array_chunk
    $xml = simplexml_load_file($filename)->offers->offer;

    // nulling aux field, which is used to check if present in xml
    DB::table('data')->update(['in_xml' => 0]);

    foreach($xml as $offer){

        // insert & update
        DB::table('data')->upsert(
        [
            'id' => $offer->id,
            'mark' => $offer->mark,
            'model' => $offer->model,
            'generation' => $offer->generation,
            'year' => $offer->year,
            'run' => $offer->run,
            'color' => $offer->color,
            'body_type' => $offer->{'body-type'},
            'engine_type' => $offer->{'engine-type'},
            'transmission' => $offer->transmission,
            'gear_type' => $offer->{'gear-type'},

            // best way to insert empty SimpleXMLElement into integer MySQL
            // most parsers use json_encode/json_decode features
            'generation_id' => (int)($offer->generation_id),
        ],
        ['id'],
        ['mark', 'model', 'generation', 'year', 'run', 'color', 'body_type', 'engine_type', 'transmission', 'gear_type', 'in_xml']
        );

        // update aux field
        DB::table('data')->where('id', '=', $offer->id)->update(['in_xml' => 1]);
    }
  // delete if not in the xml file
    DB::table('data')->where('in_xml', '=', 0)->delete();

    }

}
