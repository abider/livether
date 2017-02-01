![livether](http://oh6t02bhk.bkt.clouddn.com/macboog-retina-big.png)
## Livether
* Live Together，直播聚合，包括斗鱼、熊猫、全民等直播平台
* 方便干净的简洁观看（只有直播，没有弹幕等干扰）
* 直接进入原直播间观看直播
* 关注直播间功能，个人中心包括关注列表（筛选在线）
* 个人项目练手使用，无上线计划

## 概述
* PHP框架[ Laravel 5.3](https://laravel.com/docs/5.3)
* Javascript框架 [Vue.js 2.0](https://vuejs.org/v2/guide/)
* 本地开发环境使用 [Homestead](https://github.com/laravel/homestead) 进行开发

## 计划任务

此项目的计划任务以 Laravel 的 [任务调度](https://laravel.com/docs/5.3/scheduling) 方式执行。
* 命令：`db:seed --class=RoomsTableSeeder`
* 说明：每五分钟获取一次官方数据并填充数据库
