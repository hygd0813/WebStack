jQuery(function($) {

    var _girls = {
        zh: ['cn_1', 'cn_2', 'cn_3', 'cn_4', 'cn_5']
    };
    var config = {
        lc_goToEnChat: '.js-go-to-en-chat',
        container: '.js-livechat-girl',
        girlImageHolder: '.js-girl-holder',
        girlImage: '.girl',
        girlImageHover: 'girl_hover',
        livechatBoard: '.js-live-chat-board',
        livechatBoardClose: '.js-lc-board-close',
        livechatGirlHint: '.js-livechat-hint',
        randomGirlName: ''
    };

    function getRandomGirl() {
        var qq = $('.girl-holder').data('qq'),
            a = bloghost + 'zb_users/plugin/heykefu/avatar/',
            b = 'zh',
            c = 'en';
        b in _girls && (c = b);
        b = _girls[c];
        c = Math.floor(Math.random() * b.length);
        config.randomGirlName = b[c];
        if (qq != '') {
            return '//q2.qlogo.cn/headimg_dl?dst_uin=' + qq + '&spec=100'
        } else {
            return a + b[c] + '.png'
        }
    };

    $(config.container).removeClass('js-none').delay(500).queue(function() {
        $(config.container).addClass('animated').dequeue()
    }.bind(this));
    var a = getRandomGirl(),
        b = $('<img/>', {
            'class': 'girl js-girl-image',
            'src': a
        });
    $(config.container).find(config.girlImageHolder).prepend(b);
    $(config.container).attr("id", "lc-girl-block-" + config.randomGirlName);
    startAnimation();
    $(config.container).on('mouseover', '.girl', function() {
        showHintMessage()
    }.bind(this)).on('mouseout', '.girl', function() {
        hideHintMessage()
    }.bind(this));

    function changeImageOnHover() {
        var a = $(config.container).find(config.girlImage),
            b = $(a).clone().addClass('girl_smiling'),
            c = config.girlImageHover;
        b.attr('src', function(a, b) {
            return b.replace('chat-presales', 'chat-presales/smile')
        });
        $(this.config.container).find(this.config.girlImageHolder).prepend(b);
        a.on('mouseover', a, function() {
                a.hasClass(c) || $(a).addClass(c)
            }
            .bind(this)).on('mouseleave', a, function() {
                a.hasClass(c) && $(a).removeClass(c)
            }
            .bind(this))
    };

    function startAnimation() {
        function a() {
            b.toggleClass('animated');
            return setInterval(function() {
                b.toggleClass('animated')
            }, 5E3)
        }
        var b = $('.js-animated-circles');
        setTimeout(function() {
                showHintMessage();
                setTimeout(function() {
                        hideHintMessage();
                        this.animaTimer0 = setTimeout(function() {
                                this.animaTimer = a()
                            }
                            .bind(this), 1E4)
                    }
                    .bind(this), 5E3)
            }
            .bind(this), 1E3);
    };

    function showHintMessage() {
        var a = $(config.livechatGirlHint);
        this.hintHideTimer && clearTimeout(this.hintHideTimer);
        a.show();
        this.hintShowTimer = setTimeout(function() {
            a.removeClass('hide_hint').addClass('show_hint')
        }, 100)
    };

    function hideHintMessage() {
        var a = $(config.livechatGirlHint);
        this.hintShowTimer && clearTimeout(this.hintShowTimer);
        this.hintHideTimer = setTimeout(function() {
            a.addClass('hide_hint').delay(250).queue(function() {
                    a.removeClass('show_hint').hide().dequeue()
                }
                .bind(this))
        }, 100)
    };
    //indexkefu end

});