<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PageRepository;
use App\Repositories\Contracts\WatchesRepository;
use App\Repositories\Contracts\EncountersRepository;
use App\Repositories\Contracts\ItemsRepository;
use App\Repositories\Contracts\AugmentsRepository;
use App\Repositories\Contracts\TraitsRepository;
use App\Repositories\Contracts\ChampionsRepository;
use App\Repositories\Contracts\TierListsRepository;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class HomepageController extends Controller
{
    public function __construct(
        PageRepository $repository,
        WatchesRepository $watchesRepository,
        EncountersRepository $encountersRepository,
        ItemsRepository $itemsRepository,
        AugmentsRepository $augmentsRepository,
        TraitsRepository $traitsRepository,
        ChampionsRepository $championsRepository,
        TierListsRepository $tierlistRepository,

    ){
        $this->repository = $repository;
        $this->watchesRepository = $watchesRepository;
        $this->encountersRepository = $encountersRepository;
        $this->itemsRepository = $itemsRepository;
        $this->augmentsRepository = $augmentsRepository;
        $this->traitsRepository = $traitsRepository;
        $this->championsRepository = $championsRepository;
        $this->tierlistRepository = $tierlistRepository;
    }

    public function index(Request $reqeust)
    {   
        return view('frontend.tft.homepage.index');
    }

    public function tierList(Request $reqeust)
    {   
        $tierlist = $this->tierlistRepository->getTierList();
        $rankS = [];
        $rankA = [];
        $rankB = [];
        foreach($tierlist as $item){
            if($item['type'] == "s"){
                $rankS[] = $item;
            }
            if($item['type'] == "a"){
                $rankA[] = $item;
            }
            if($item['type'] == "b"){
                $rankB[] = $item;
            }
        }

        return view('frontend.tft.homepage.tierlist', compact('rankS', 'rankA', 'rankB'));
    }

    public function learn(Request $reqeust)
    {   
        return view('frontend.tft.homepage.learn');
    }

    public function ajaxTierList(Request $request) {
        if($request->isMethod('post') && $request->ajax()) {
            if($request->has('tierlistId')) {
                $id = $request->get('tierlistId');
                $champion = $this->tierlistRepository->getTierListFist($id);
                $traits = $this->traitsTierList($champion);
                if($champion) {
                    $returnHTML = view('frontend.tft.homepage.partials.detail-tierlist',compact('champion','traits'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                }else{
                    return response()->json( array('success' => false, 'html'=>'Đội hình đang được cập nhập') );
                }
            }
            if($request->has('tierlistAId')) {
                $id = $request->get('tierlistAId');
                $championA = $this->tierlistRepository->getTierListFist($id);
                $traits = $this->traitsTierList($championA);
                if($championA) {
                    $returnHTML = view('frontend.tft.homepage.partials.tierlist-a',compact('championA','traits'))->render();
                    return response()->json( array('success_rankA' => true, 'html'=>$returnHTML) );
                }else{
                    return response()->json( array('success_rankA' => false, 'html'=>'Đội hình đang được cập nhập') );
                }
            }

            if($request->has('tierlistBId')) {
                $id = $request->get('tierlistBId');
                $championB = $this->tierlistRepository->getTierListFist($id);

                $traits = $this->traitsTierList($championB);
                if($championB) {
                    $returnHTML = view('frontend.tft.homepage.partials.tierlist-b',compact('championB','traits'))->render();
                    return response()->json( array('success_rankB' => true, 'html'=>$returnHTML) );
                }else{
                    return response()->json( array('success_rankB' => false, 'html'=>'Đội hình đang được cập nhập') );
                }
            }
            
        }   
    }

    //page watch 
    public function guides(Request $reqeust)
    {   
        $guides =  $this->watchesRepository->getwatchAll();
        return view('frontend.tft.watch.guides',compact('guides'));
    }

    public function comps(Request $reqeust)
    {   
        $comps =  $this->watchesRepository->getwatchAll();
        return view('frontend.tft.watch.comps',compact('comps'));
    }
    

    // page champions 
    public function encounters(Request $reqeust)
    {   
        $encounters =  $this->encountersRepository->getEncountersAll();
        return view('frontend.tft.learn.encounters',compact('encounters'));
    }

    // public function championsType(Request $request)
    // {   
    //     if($request->isMethod('post') && $request->ajax()) {
    //         if($request->has('type')) {
    //             $type = $request->get('type');
    //             $typeChampions =  $this->championsRepository->getTypeChampions($type);
    //             if ($typeChampions->isEmpty()) {
    //                 $typeChampions =  $this->championsRepository->getChampionsAll();
    //                 $returnHTML = view('frontend.tft.learn.partials.champion-type',compact('typeChampions'))->render();
    //                 return response()->json( array('success' => true, 'html'=>$returnHTML) );
    //             } else {
    //                 $returnHTML = view('frontend.tft.learn.partials.Champion-type',compact('typeChampions'))->render();
    //                 return response()->json( array('success' => true, 'html'=>$returnHTML) );
    //             }
    //         }
    //     }   
    //     return view('frontend.tft.learn.augments',compact('augments'));
    // }
    // page champions 
    public function champions(Request $reqeust)
    {   
        $champions =  $this->championsRepository->getChampionsAll();
        return view('frontend.tft.learn.champions',compact('champions'));
    }

    public function championsType(Request $request)
    {   
        if($request->isMethod('post') && $request->ajax()) {
            if($request->has('type')) {
                $type = $request->get('type');
                $typeChampions =  $this->championsRepository->getTypeChampions($type);
                if ($typeChampions->isEmpty()) {
                    $typeChampions =  $this->championsRepository->getChampionsAll();
                    $returnHTML = view('frontend.tft.learn.partials.champion-type',compact('typeChampions'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                } else {
                    $returnHTML = view('frontend.tft.learn.partials.champion-type',compact('typeChampions'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                }
            }
        }   
        return view('frontend.tft.learn.augments',compact('augments'));
    }
    // page items 
    public function items(Request $request)
    {   
        $items =  $this->itemsRepository->getItemsAll();
        return view('frontend.tft.learn.items',compact('items'));
    }

    public function itemsType(Request $request)
    {   
        if($request->isMethod('post') && $request->ajax()) {
            if($request->has('type')) {
                $type = $request->get('type');
                $typeItems =  $this->itemsRepository->getTypeItems($type);
                if ($typeItems->isEmpty()) {
                    $typeItems =  $this->itemsRepository->getItemsAll();
                    $returnHTML = view('frontend.tft.learn.partials.item-type',compact('typeItems'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                } else {
                    $returnHTML = view('frontend.tft.learn.partials.item-type',compact('typeItems'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                }
            }
        }   
        return view('frontend.tft.learn.augments',compact('augments'));
    }

    public function traits(Request $request)
    {   
        $traits =  $this->traitsRepository->getTraitsAll();
        return view('frontend.tft.learn.traits',compact('traits'));
    }

    public function traitsType(Request $request)
    {   
        if($request->isMethod('post') && $request->ajax()) {
            if($request->has('type')) {
                $type = $request->get('type');
                $typeTraits =  $this->traitsRepository->getTypeTraits($type);
                if ($typeTraits->isEmpty()) {
                    
                    $typeTraits =  $this->traitsRepository->getTraitsAll();
                    $returnHTML = view('frontend.tft.learn.partials.trait-type',compact('typeTraits'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                } else {
                    $returnHTML = view('frontend.tft.learn.partials.trait-type',compact('typeTraits'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                }
            }
        }   
        return view('frontend.tft.learn.augments',compact('augments'));
    }

    public function traitsTierList($champion){
        $array = [];
        foreach($champion->tierlists_champion as $champion){
            $objectChampions = $this->championsRepository->getChampionsFist($champion['id']);
            foreach($objectChampions->trait as $traits){
                $array [] = $traits['id'];
            }
        }
        $counts = array_count_values($array);
        arsort($counts);
        $results = array_slice($counts, 0, 4, true);
        $arrayData = [];
        foreach ($results as $value => $count) {
            $trait = $this->traitsRepository->getTraitFist($value);
            $arrayData [] = [
                'trait' => $trait,
                'count' => $count,
            ];
        }
        return $arrayData;
    }

   

    public function augments(Request $request)
    {   
        $augments =  $this->augmentsRepository->getAugmentsAll();
        return view('frontend.tft.learn.augments',compact('augments'));
    }

    public function augmentType(Request $request)
    {   
        if($request->isMethod('post') && $request->ajax()) {
            if($request->has('type')) {
                $type = $request->get('type');
                $typeAugments =  $this->augmentsRepository->getTypeAugments($type);
                if ($typeAugments->isEmpty()) {
                    $typeAugments =  $this->augmentsRepository->getAugmentsAll();
                    $returnHTML = view('frontend.tft.learn.partials.augment-type',compact('typeAugments'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                } else {
                    $returnHTML = view('frontend.tft.learn.partials.augment-type',compact('typeAugments'))->render();
                    return response()->json( array('success' => true, 'html'=>$returnHTML) );
                }
            }
        }   
        return view('frontend.tft.learn.augments',compact('augments'));
    }

    public function newPlayer(Request $request)
    {   
        return view('frontend.tft.learn.newplayer');
    }

    public function returnPlayer(Request $request)
    {   
        return view('frontend.tft.learn.returnPlayer');
    }
    
    
}
