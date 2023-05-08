<!--头部主要内容-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="CentOS,Ubuntu,Fedora,Debian,Linux,KVM,Virtualization">
<meta name="description" content="The site for people who would like to build Network Servers with CentOS, Ubuntu, Fedora, Debian, Windows Server.">
<title><?php wp_title('-', true, 'right'); ?></title>
<link href="<?php echo get_template_directory_uri(); ?>/static/css/base.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/static/css/navi.css" media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo get_template_directory_uri(); ?>/static/css/main.css" media="screen" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/static/js/popup.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="<?php echo get_template_directory_uri(); ?>/static/js/js-G-ZE66RTNTHG.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZE66RTNTHG');
</script>
<script type="text/javascript">
hs.graphicsDir = './command/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
</script>
<!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
<script type="text/javascript" async="true">
(function() {
  var host = 'www.themoneytizer.com';
  var element = document.createElement('script');
  var firstScript = document.getElementsByTagName('script')[0];
  var url = 'https://cmp.quantcast.com'
    .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js');
  var uspTries = 0;
  var uspTriesLimit = 3;
  element.async = true;
  element.type = 'text/javascript';
  element.src = url;

  firstScript.parentNode.insertBefore(element, firstScript);

  function makeStub() {
    var TCF_LOCATOR_NAME = '__tcfapiLocator';
    var queue = [];
    var win = window;
    var cmpFrame;

    function addFrame() {
      var doc = win.document;
      var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

      if (!otherCMP) {
        if (doc.body) {
          var iframe = doc.createElement('iframe');

          iframe.style.cssText = 'display:none';
          iframe.name = TCF_LOCATOR_NAME;
          doc.body.appendChild(iframe);
        } else {
          setTimeout(addFrame, 5);
        }
      }
      return !otherCMP;
    }

    function tcfAPIHandler() {
      var gdprApplies;
      var args = arguments;

      if (!args.length) {
        return queue;
      } else if (args[0] === 'setGdprApplies') {
        if (
          args.length > 3 &&
          args[2] === 2 &&
          typeof args[3] === 'boolean'
        ) {
          gdprApplies = args[3];
          if (typeof args[2] === 'function') {
            args[2]('set', true);
          }
        }
      } else if (args[0] === 'ping') {
        var retr = {
          gdprApplies: gdprApplies,
          cmpLoaded: false,
          cmpStatus: 'stub'
        };

        if (typeof args[2] === 'function') {
          args[2](retr);
        }
      } else {
        if(args[0] === 'init' && typeof args[3] === 'object') {
          args[3] = { ...args[3], tag_version: 'V2' };
        }
        queue.push(args);
      }
    }

    function postMessageEventHandler(event) {
      var msgIsString = typeof event.data === 'string';
      var json = {};

      try {
        if (msgIsString) {
          json = JSON.parse(event.data);
        } else {
          json = event.data;
        }
      } catch (ignore) {}

      var payload = json.__tcfapiCall;

      if (payload) {
        window.__tcfapi(
          payload.command,
          payload.version,
          function(retValue, success) {
            var returnMsg = {
              __tcfapiReturn: {
                returnValue: retValue,
                success: success,
                callId: payload.callId
              }
            };
            if (msgIsString) {
              returnMsg = JSON.stringify(returnMsg);
            }
            if (event && event.source && event.source.postMessage) {
              event.source.postMessage(returnMsg, '*');
            }
          },
          payload.parameter
        );
      }
    }

    while (win) {
      try {
        if (win.frames[TCF_LOCATOR_NAME]) {
          cmpFrame = win;
          break;
        }
      } catch (ignore) {}

      if (win === window.top) {
        break;
      }
      win = win.parent;
    }
    if (!cmpFrame) {
      addFrame();
      win.__tcfapi = tcfAPIHandler;
      win.addEventListener('message', postMessageEventHandler, false);
    }
  };

  makeStub();

  var uspStubFunction = function() {
    var arg = arguments;
    if (typeof window.__uspapi !== uspStubFunction) {
      setTimeout(function() {
        if (typeof window.__uspapi !== 'undefined') {
          window.__uspapi.apply(window.__uspapi, arg);
        }
      }, 500);
    }
  };

  var checkIfUspIsReady = function() {
    uspTries++;
    if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
      console.warn('USP is not accessible');
    } else {
      clearInterval(uspInterval);
    }
  };

  if (typeof window.__uspapi === 'undefined') {
    window.__uspapi = uspStubFunction;
    var uspInterval = setInterval(checkIfUspIsReady, 6000);
  }
})();
</script>
<!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
<?php wp_head(); ?>
</head>
<body>
<!--主菜单栏-->
<div id="top-menu">
  <table id="menu-table">
    <tr>
      <td class="menu" style="width: 15%;"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a></td>
      <td class="menu">
        <div class="top_navi">
        <?php
          /*
          wp_nav_menu( $args )
          @参数 array $args, 传递此参数时用array(成员参数名=>成员参数值)
          特别说明：
          调用导航菜单时，可以直接复制以下代码。然后根据需要删除成员参数
          */
          wp_nav_menu( array(
            'theme_location'				=> 'daniot-topmenu',	//[保留]调用左侧导航菜单
            'container'							=> false,							//[可删]
            'before'								=> '',								//[可删]
            'after'									=> '',								//[可删]		
            'link_before'						=> '',								//[可删]
            'link_after'						=> '',							  //[可删]
            'depth'								  => 3,								//[可删]
          ) );
        ?>
        </div>
      </td>
      <td class="menu"><a href="note-policy.html">隐私策略</a></td>
      <td class="menu"><a href="note-send.html">支持/联系我们</a></td>
      <td class="menu" style="width: 16%;">
        <div class="count"><?php view_count();?></div>
      </td>
    </tr>
  </table><!--menu-table-->
</div><!--top-menu-->
<!--左侧菜单栏-->
<?php get_sidebar(); ?>
<!--内容栏-->
<div id="contents">
<!--判断是首页的话只显示网站标题和RSS订阅配置，不是首页的话，只显示文章标题和文章时间-->
<?php if(is_home() || is_front_page() || is_search()) { ?>
  <!--网站标题和RSS订阅配置-->
  <table style="width: 96%; line-height: 1.5; margin-top: 10px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 50%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"> 
            <?php bloginfo('title'); ?>&nbsp;
            <a href="<?php bloginfo('rss2_url'); ?>" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[RSS]</a>&nbsp;
            <a href="" 
            style="color: #ff4500; text-decoration: none; font-weight: normal; font-size: 12px;">[本站历史]</a>&nbsp;
            <?php get_search_form(); ?>
        </div><!--subject-->
      </td>
      <td style="width: 50%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="searchform"> 
            <?php get_search_form(); ?>
        </div><!--searchform-->
      </td>
    </tr>
  </table><!--内容标题和RSS订阅配置-->
<?php } else {?>
<br>
  <table style="width: 96%; line-height: 1.5; margin-top: 5px; margin-bottom: 10px; margin-left: auto; margin-right: auto;">
    <tr>
      <td style="width: 100%; height: 28px; color: #ff3399; padding-left: 50px; background: url(<?php echo get_template_directory_uri(); ?>/static/image/icon.gif) #ffffff no-repeat 0 0;">
        <div class="subject"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="date"><?php the_time('Y年m月d日'); ?></div></div>
      </td>
    </tr>
  </table>

<?php } ?>