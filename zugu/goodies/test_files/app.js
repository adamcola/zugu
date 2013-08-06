var UploadCounter = {
    digits: null,
    value: 0,
    inc: 0,
    pace: 0,
    counterInt: null,
    init: function (a) {
        $.extend(this, a);
        this.digits = $("#uploadCounter .digit");
        this.counterInt = setInterval($.proxy(function () {
            this.value += this.inc;
            this.roll(this.value)
        }, this), this.pace);

    },
    roll: function (e) {
        var c = this.addCommas(e);
        this.update(c);
        if (e && e != 0) {
            for (i = c.length - 1; i >= 0; i--) {
                var d = $("#uploadCounter #num" + i);
                var b = c.charAt(i);
                if (d.val != b) {
                    d.val(b);
                    if (b == ",") {
                        d.animate({
                            top: (10*-46+2)+"px"
                        }, 1500)
                    } else {
                        var a = (Number(b)-1) * -46+2;
                        if(Number(b) == 0) {
                          a = 9*-46+2;
                        }

                        d.animate({
                            top: a + "px"
                        }, 1500)
                    }
                }
            }
        }
    },
    lpad: function(str, padString, length) {
	    while (str.length < length)
        str = padString + str;
      return str;
    },
    addCommas: function (b) {
        b = String(b);
        var a = /(\d+)(\d{3})/;
        while (a.test(b)) {
            b = b.replace(a, "$1,$2")
        }
        b = this.lpad(b, "0", this.digits.length);
        return b
    },
    update: function (b) {
        var a = b.length - this.digits.length;
        if (a > 0) {
            for (i = 1; i <= a; i++) {
                $("#uploadCounter").append('<div class="digit" id="num' + (this.digits.length + i - 1) + '">&nbsp;</div>')
            }
            this.digits = $("#uploadCounter .digit")
        }
    },
    stop: function () {
        if (this.counterInt != null) {
            clearInterval(this.counterInt);
            this.counterInt = null
        }
    }
};

function loadSocials() {
  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=326750177396514";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

/*
  (function () {
    var po = document.createElement('script');
    po.type = 'text/javascript';
    po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

  !function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src = "//platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);
    }
  }(document, "script", "twitter-wjs");
*/
};

function registerDownload(releaseId, link) {
  $.post("/pre/downloads/download", {"releaseId":releaseId}, function (resp) {
    window.location.href = link;
  });
};

function scrollToNextSlide(playTime) {
  var s = $('#slides');
  if (s.size() <= 0) return;
  s.slides.option.play = 1000;
  var n = $('.pagination .current', s).next();
  (n.size() > 0) ? n.children('a').click() : $('.pagination li:first', s).children('a').click();
}

$(document).ready(function() {
    var one_day = -1000 * 60 * 60 * 24;
    var millennium = new Date(2012, 6, 19); //Month is 0-11 in JavaScript
    var today = new Date();
    var days_past = Math.ceil((millennium.getTime() - today.getTime()) / one_day);
    var uploaded_files = 423190 + (days_past * 5000);
    try{
        UploadCounter.init({"value": uploaded_files, "inc":7,"pace":10000});
        UploadCounter.roll(uploaded_files);
    } catch(e){}
});
