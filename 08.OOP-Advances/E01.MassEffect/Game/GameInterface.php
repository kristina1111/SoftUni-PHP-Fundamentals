<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 14:18 ч.
 */

namespace Game;


interface GameInterface
{
//    const STAR_SYSTEM_ARTEMIS_TAU = [
//        "name" => "Artemis-Tau",
//        "neighbours" => [
//            [
//                "name" => self::STAR_SYSTEM_SERPENT_NEBULA["name"],
//                "distance" => 50
//            ],
//            [
//                "name" => self::STAR_SYSTEM_KEPLER_VERGE["name"],
//                "distance" => 120
//            ]
//
//        ]];
//    const STAR_SYSTEM_SERPENT_NEBULA = [
//        "name" => "Serpent-Nebula",
//        "neighbours" => [
//            [
//                "name" => self::STAR_SYSTEM_ARTEMIS_TAU["name"],
//                "distance" => 50
//            ],
//            [
//                "name" => self::STAR_SYSTEM_HADES_GAMMA["name"],
//                "distance" => 360
//            ]
//        ]
//    ];
//    const STAR_SYSTEM_HADES_GAMMA = [
//        "name" => "Hades-Gamma",
//        "neighbours" => [
//            [
//                "name" => self::STAR_SYSTEM_SERPENT_NEBULA["name"],
//                "distance" => 360
//            ],
//            [
//                "name" => self::STAR_SYSTEM_KEPLER_VERGE["name"],
//                "distance" => 145
//            ]
//        ]
//
//    ];
//    const STAR_SYSTEM_KEPLER_VERGE = [
//        "name" => "Kepler-Verge",
//        "neighbours" => [
//            [
//                "name" => self::STAR_SYSTEM_HADES_GAMMA["name"],
//                "distance" => 145
//            ],
//            [
//                "name" => self::STAR_SYSTEM_ARTEMIS_TAU["name"],
//                "distance" => 120
//            ]
//        ]
//    ];

    const STAR_SYSTEM_ARTEMIS_TAU = "Artemis-Tau";
    const STAR_SYSTEM_SERPENT_NEBULA = "Serpent-Nebula";
    const STAR_SYSTEM_HADES_GAMMA = "Hades-Gamma";
    const STAR_SYSTEM_KEPLER_VERGE = "Kepler-Verge";

    public function start();
}