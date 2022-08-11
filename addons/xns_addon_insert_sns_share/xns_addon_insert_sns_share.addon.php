<?php
    if(!defined("__ZBXE__")) exit();

    /**
     * @author XNS (xnssolution@gmail.com / https://xenara.zaggu.net)
     **/

    if($called_position == 'before_display_content') {
      $logged_info = Context::get('logged_info');
      $oDocument = Context::get('oDocument');

      //애드온 변수 기본값 설정
      if(!$addon_info->output_kakaotalk) $addon_info->output_kakaotalk = 'Y';
      if(!$addon_info->output_band) $addon_info->output_band = 'Y';
      if(!$addon_info->output_naver) $addon_info->output_naver = 'Y';
      if(!$addon_info->output_facebook) $addon_info->output_facebook = 'Y';
      if(!$addon_info->output_twitter) $addon_info->output_twitter = 'Y';
      if(!$addon_info->output_linkcopy) $addon_info->output_linkcopy = 'Y';

      if($addon_info->kakao_javascript_key){
        $kakao_javascript_key = $addon_info->kakao_javascript_key;
      }

      if($oDocument->document_srl && !Context::get('act')){
        //카카오 JS 인클루드
      	Context::addJSFile('//developers.kakao.com/sdk/js/kakao.min.js');

        //fontawesome CSS 인클루드
      	Context::addCSSFile('https://use.fontawesome.com/releases/v5.7.2/css/all.css');
        //애드온경로 및 CSS 인클루드
        $addon_path = $request_uri.'./addons/xns_addon_insert_sns_share/';
	    	Context::addCSSFile($request_uri.$addon_path.'css/addon.css');

        //공유제목 등 정보 설정
        $item_url = getFullUrl('','document_srl',$oDocument->document_srl);
        $meta_title = $oDocument->getTitleText();
        $meta_description = $oDocument->getSummary(100);
        $meta_image = '';
        if($oDocument->getThumbnail(200,200,'crop')){
          $meta_image = getFullUrl('').str_replace('./','',$oDocument->getThumbnail(200,200,'crop'));
        }

        //삽입 HTML 코드
        $addon_html = '';
        $addon_html .= '<div class="xns_addon_insert_sns_share">';
        $addon_html .= '<div class="sns_area">';
        $addon_html .= '  <div class="sns_btn_area">';
        if($kakao_javascript_key && $addon_info->output_naver=='Y'){
          $addon_html .= '    <a class="kakao btn_sns" id="btn_kakao_'.$oDocument->document_srl.'" href="javascript:;">';
          $addon_html .= '      <img src="'.$addon_path.'images/icon_kakao.png" />';
          $addon_html .= '    </a>';
        }
        if($addon_info->output_band=='Y'){
          $addon_html .= '    <a class="band btn_sns" title="BAND" href="https://band.us/plugin/share?body='.urlencode($meta_title.' '.str_replace('amp;','',$item_url)).'" target="_blank">';
          $addon_html .= '      <img src="'.$addon_path.'images/icon_band.png" />';
          $addon_html .= '    </a>';
        }
        if($addon_info->output_naver=='Y'){
          $addon_html .= '    <a class="naver btn_sns" title="NAVER" href="https://share.naver.com/web/shareView.nhn?url='.urlencode(str_replace('amp;','',$item_url)).'&title='.urlencode($meta_title).'" target="_blank">';
          $addon_html .= '      <img src="'.$addon_path.'images/icon_naver.png" />';
          $addon_html .= '    </a>';
        }
        if($addon_info->output_facebook=='Y'){
          $addon_html .= '    <a class="facebook" title="FACEBOOK" href="//www.facebook.com/share.php?u='.urlencode(str_replace('amp;','',$item_url)).'" target="_blank">';
          $addon_html .= '      <i class="fab fa-facebook-f"></i>';
          $addon_html .= '    </a>';
        }
        if($addon_info->output_twitter=='Y'){
          $addon_html .= '    <a class="twitter" title="TWITTER" href="//twitter.com/intent/tweet?text='.urlencode($meta_title.' '.str_replace('amp;','',$item_url)).'" target="_blank">';
          $addon_html .= '      <i class="fab fa-twitter"></i>';
          $addon_html .= '    </a>';
        }
        if($addon_info->output_linkcopy=='Y'){
          $addon_html .= '    <a class="item_copy" title="COPY" href="#" onclick="copyItemLink(); return false;">';
          $addon_html .= '      <i class="fas fa-link"></i>';
          $addon_html .= '      <input type="text" value="'.str_replace('amp;','',$item_url).'" id="input_copy_item_link" readonly style="position:absolute; top:-100px; width:1px; padding:0px; border:0px; display:inline-block;" />';
          $addon_html .= '    </a>';
        }
        $addon_html .= '  </div>';
        $addon_html .= '</div>';
        $addon_html .= '</div>';


        $header_content = '';
        $header_content .= '
          <script>
            //공유링크 복사 함수
            function copyItemLink(){
              var copyText = document.getElementById("input_copy_item_link");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy");
              alert("공유링크가 복사되었습니다.");
            }
        ';
        if($kakao_javascript_key){
          $header_content .= '
              Kakao.init("'.$kakao_javascript_key.'");
          ';
        }
        $header_content .= '
            jQuery(document).ready(function(){
              jQuery(".xe_content").eq(0).append("'.addslashes($addon_html).'");
        ';
        if($kakao_javascript_key){
          $header_content .= '
            Kakao.Link.createDefaultButton({
              container: "#btn_kakao_'.$oDocument->document_srl.'",
              objectType: "feed",
              content: {
                title: "'.$meta_title.'",
                description: "'.$meta_description.'",
                imageUrl: "'.$meta_image.'",
                link: {
                  mobileWebUrl: "'.str_replace('amp;','',$item_url).'",
                  webUrl: "'.str_replace('amp;','',$item_url).'"
                }
              }
            });
          ';
        }
        $header_content .= '
            });
          </script>
        ';
        Context::addHtmlHeader($header_content);

      }

    }
?>
