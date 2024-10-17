<?php declare(strict_types=1);
// Persisten data paths. Used as a mock database.
define("USER_DATA", "../data/user_data.dat");

/* 
Some schemas are using their index on the array as an id. This servers
more or less the purpose of indexed tables. This is a very fragile and
non-robust solution but the for thes scope given seems like an OK solution.
*/

/*
    Users Schema:
    id : number
    username : string
    password : string
*/
$Users = unserialize(file_get_contents(USER_DATA));


/*
    Book Schema
    id : number
    isbn : number
    title : string
    description : string
    authors : Array<String>
*/
$Books = [
    [
        "id" => 1,
        "isbn" => 9798602477429,
        "title" => "You don't know JS Yet: Get Started",
        "description" => "prepares you for the journey ahead, first surveying the language then detailing how the rest of the You Don't Know JS Yet book series guides you to knowing JS more deeply.",
        "authors" => ["Simpson, Kyle"],
        "image" => "/php-project/assets/Ecobooks2.jpg"
    ],
    [
        "id" => 2,
        "isbn" => 9780553270969,
        "title" => "The book of Five Rings",
        "description" => "The Book of Five Rings (五輪書, Go Rin no Sho) is a text on kenjutsu and the martial arts in general, written by the Japanese swordsman Miyamoto Musashi around 1645.",
        "authors" => ["Miyamoto Musashi"],
        "image" => "/php-project/assets/Ecobooks2.jpg"
    ],

];

/*
    Language Schema. Id is given by their position in the array.
    id : number
    shorthand : string
*/

$Languages = [
    "English" => [
        "id"  => 1,
        "shorthand" => "en",
    ],
    "Spanish" => [
        "id" => 2,
        "shorthand" => "es"
    ],
    "Galician" => [
        "id" => 3,
        "shorthand" => "gl"
    ],
    "Portuguese" => [
        "id" => 4,
        "shorthand" => "pt"
    ],
    "Italian" => [
        "id" => 5,
        "shorthand" => "it"
    ],
    "German" => [
        "id" => 6,
        "shorthand" => "de"
    ]
];


/*
    Print Size schema
    id : number
    name : string
    width : number (in mm)
    height : number (in mm)
*/

$PrintSizes = [
    "A4" => [
        "id" => 1,
        "width" => 210,
        "height" => 297
    ],
    "A5" => [
        "id" => 2,
        "width" => 148,
        "height" => 210
    ],
    "A6" => [
        "id" => 3,
        "width" => 105,
        "height" => 148
    ],
];

/* 
    Cover colors schema, id is given by the position on the array.
    id : number
    pantone : string

*/
$CoverColors = [
    "Black" => [
        "id" => 1,
        "pantone" => "Black 4 2X"
    ], 
    "White" => [
        "id" => 2,
        "pantone" => "Opaque white"
    ],
    "Red" => [
        "id" => 3,
        "pantone" => "Red 032"
    ], 
    "Blue" => [
        "id" => 4,
        "pantone" => "Process Blue"
    ],
    "Brown" => [
        "id" => 5,
        "pantone" => "PMS 729"
    ]
];

/*
    Cover Type schema:
    id : number
    type : string
*/

$CoverTypes = [
    "Hard",
    "Soft",
    "Dust jacket",
    "Ring binding"
];

?>