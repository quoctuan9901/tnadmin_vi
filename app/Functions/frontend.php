<?php
function gwt ($page,$code) {
    if (Session::get('lang') == "en") {
        return App\Models\PageContent::select('content_en')->where([
            ['page',$page],
            ['code',$code]
        ])->first()->content_en;
    } else {
        return App\Models\PageContent::select('content_vi')->where([
            ['page', $page],
            ['code', $code]
        ])->first()->content_vi;
    }
}

function readmore ($string,$length = 100) {
    if (mb_strlen($string) > $length) {
        $pos = mb_strpos($string," ",$length);
        $str = mb_substr($string,0,$pos);
        return $str. " ...";
    } else {
        return $string;
    }
}

function imt ($position,$id) {
    $data = App\Models\Banner::select('image','alt')->where([
        ['status','on'],
        ['position_id',$position],
        ['id',$id]
    ])->first()->toArray();

    return 'src='.$data["image"].' alt='.$data["alt"];
}

function transite ($vi,$en) {
    if (Session::get('lang') == "en") {
        if (empty($en)) {
            return $vi;
        }
        return $en;
    } else {
        if (empty($vi)) {
            return $en;
        }
        return $vi;
    }
}
?>