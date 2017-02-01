<?php

namespace App\Handle;


class DefaultHandle
{
    public function handle()
    {
        $items = array_merge(
            $this->douyu(1),
            $this->panda(1),
            $this->panda(2),
            $this->panda(3),
            $this->quanmin(1)
        );

        return $items;
    }

    public function douyu($page = 0)
    {
        if ($page > 0) $page--;
        $json = file_get_contents("http://open.douyucdn.cn/api/RoomApi/live?offset=$page&limit=100");
        $items = json_decode($json, true);
        foreach ($items['data'] as $item) {
            $id = 'douyu' . $item['room_id'];
            $newItem['roomid'] = $item['room_id'];
            $newItem['author'] = $item['nickname'];
            $newItem['title'] = $item['room_name'];
            $newItem['category'] = 'douyu';
            $newItem['cate'] = '斗鱼直播';
            $newItem['avatar'] = $item['avatar'];
            $newItem['looker'] = $item['online'];
            $newItem['thumb'] = $item['room_src'];
            $newItem['jump_url'] = 'https://www.douyu.com/' . $item['room_id'];
            $newItem['live_url'] = 'http://staticlive.douyutv.com/common/share/play.swf?room_id=' . $item['room_id'];
            $newItem['id'] = $id;
            $newItem['iid'] = $id;
            $newItems[] = $newItem;
        }
        return $newItems;
    }

    public function panda($page = 1)
    {
        $json = file_get_contents("http://api.m.panda.tv/ajax_live_lists?pageno=$page&pagenum=40&order=person_num&status=2&__plat=ios&__channel=appstore");
        $items = json_decode($json, true);
        foreach ($items['data']['items'] as $item) {
            $newItem['roomid'] = $item['id'];
            $newItem['author'] = $item['userinfo']['nickName'];
            $newItem['title'] = $item['name'];
            $newItem['category'] = 'panda';
            $newItem['cate'] = '熊猫直播';
            $newItem['avatar'] = $item['userinfo']['avatar'];
            $newItem['looker'] = $item['person_num'];
            $newItem['thumb'] = $item['pictures']['img'];
            $newItem['jump_url'] = 'http://www.panda.tv/' . $item['id'];
            $newItem['live_url'] = 'http://www.panda.tv/' . $item['id'];
            $newItem['id'] = 'panda' . $item['id'];
            $newItem['iid'] = 'panda' . $item['id'];
            $newItems[] = $newItem;
        }
        return $newItems;
    }

    public function quanmin($page = 1)
    {
        $list = $page > 1 ? "list_$page" : "list";
        $json = file_get_contents("http://www.quanmin.tv/json/play/$list.json");
        $items = json_decode($json, true);
        foreach ($items['data'] as $item) {
            $newItem['roomid'] = $item['uid'];
            $newItem['author'] = $item['nick'];
            $newItem['title'] = $item['title'];
            $newItem['category'] = 'quanmin';
            $newItem['cate'] = '全民直播';
            $newItem['avatar'] = $item['avatar'];
            $newItem['looker'] = $item['view'];
            $newItem['thumb'] = $item['thumb'];
            $newItem['jump_url'] = 'http://www.quanmin.tv/' . $item['uid'];
            $newItem['live_url'] = 'http://www.quanmin.tv/embed/' . $item['uid'];
            $newItem['id'] = 'quanmin' . $item['uid'];
            $newItem['iid'] = 'quanmin' . $item['uid'];
            $newItems[] = $newItem;
        }
        return $newItems;
    }

    public function toUnique(array $items)
    {
        foreach ($items as $k=>$v){
            $v = join('{@#$}', $v);
            $temp[] = $v;
        }
        $temp1 = array_unique($temp);
        foreach ($temp1 as $v) {
            $array = explode('{@#$}', $v);
            $temp2['roomid'] = $array[0];
            $temp2['author'] = $array[1];
            $temp2['title'] = $array[2];
            $temp2['category'] = $array[3];
            $temp2['cate'] = $array[4];
            $temp2['avatar'] = $array[5];
            $temp2['looker'] = $array[6];
            $temp2['thumb'] = $array[7];
            $temp2['jump_url'] = $array[8];
            $temp2['live_url'] = $array[9];
            $temp2['id'] = $array[10];
            $temp2['iid'] = $array[11];
            $newItem[] = $temp2;
        }
        return $newItem;
    }
}