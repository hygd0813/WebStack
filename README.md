# WebStack
Typecho Webstack导航主题 | 魔改 By [荒野孤灯](https://www.80srz.com)

Typecho Webstack导航主题我一直在用，首先感谢作者的无私分享。上周末休息在家，有点时间，终于又双叒叕对它下手了，修复了一些BUG(PS：忘了用的哪版，下载时间很久了)，删了一些代码，增加一些功能。

<!--more-->

### 主题模板信息

主题名称：Typecho Webstack导航主题

原主题文档：https://www.zuanmang.net/5366.html

原主题演示：https://tool.zuanmang.net

我的魔改主题演示：https://www.80srz.com/link/

### 魔改主题预览

![Webstack导航主题 | 魔改记录1][1]
![Webstack导航主题 | 魔改记录2][2]
![Webstack导航主题 | 魔改记录3][3]

### 魔改详情预览

![Webstack导航主题 | 魔改记录4][4]

 1. 增加站点评级，五角星图片显示，共分 10 个等级；
 2. 站点评级算法详情，可在 post.php 模板中修改；
 3. 增加站点首页实时预览图，API接口：`https://s0.wp.com/mshots/v1/<?php echo $this->fields->url;?>/?w=600&h=400`
 4. 增加站点点赞、踩踏两个按钮（尚存在点击后，数值不反馈问题，需刷新页面更新点赞数、踩踏数及站点评级！）；
 5. 增加了几个广告位，不设置就不加载；

![Webstack导航主题 | 魔改记录5][5]

 6. 站点 TDK 信息自动获取，ps：有些网址代码不规范，导致获取内容为空，不用理会！
 7. 增加站点评价 —— 文章自定义字段，可以加入您对该网址的一些评价；
 8. 增加网址二维码图片（使用的是自建API接口，主题文件夹下：`qrcode.php`）；
 9. 站点详情，即文章内容，若文章内容为空则显示 `博主太懒了，没给大家介绍！快联系他更新!` 可在主题文件 `post.php` 中修改；

![Webstack导航主题 | 魔改记录6][6]

 10. 增加网址聚合文章，调用站点最近10篇文章，PS：文章编辑时填入相应自定义字段，不填写则不显示聚合文章栏；提取失败则显示 `Unsupported feed format` ；

### 魔改主题使用

![Webstack导航主题 | 魔改记录7][7]

 11. 文章自定义字段：站点链接（*必填项）；
 12. 文章自定义字段：订阅链接（选填项）；
 13. 文章自定义字段：站点评价（选填项）；
 14. 文章自定义字段：站点logo（选填项，不填写则利用主题设置中的API：``自动获取，建议填写，以防有时获取失败或站点logo不是常规设置）；

![Webstack导航主题 | 魔改记录8][8]

 15. 广告，没啥好说的，总有人需要；不设置则不加载广告；

### 魔改主题下载

Github：https://github.com/hygd0813/WebStack

百度网盘：https://pan.baidu.com/s/1ppStxhp5-85IZUfxIv0NLw?pwd=q8gr

### 尚存问题

 - 点赞、踩踏后不实时更新点赞数、踩踏数、站点评价；
 - 订阅源不规范时获取失败；但影响不大；
 - TDK 信息获取默认 `UFT-8` 编码，其他编码会乱码；
 - 站内搜索功能不能用；
 - 无 tags 页面；
 - 首页子分类不能锚定定位；

### 集思广益

对这款主题魔改，你有什么好的建议，欢迎在本页留言，安啦有空时折腾折腾……

  [1]: https://cdnjson.com/images/2023/12/11/3b9f45c21bdc2474df8238cd747ed8f4.png
  [2]: https://cdnjson.com/images/2023/12/11/b79d96224fcd8b6dd28787c74b0bb3aa.png
  [3]: https://cdnjson.com/images/2023/12/11/25d184868eac365d6f221930c49b7b6e.png
  [4]: https://cdnjson.com/images/2023/12/11/_1.png
  [5]: https://cdnjson.com/images/2023/12/11/_2.png
  [6]: https://cdnjson.com/images/2023/12/11/_3.png
  [7]: https://cdnjson.com/images/2023/12/11/f92b1ecf07773d520d3b4b050961812d.png
  [8]: https://cdnjson.com/images/2023/12/11/70a583d0b2d17c0a8466f83c8b69f9a5.png
