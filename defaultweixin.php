<?php

require 'weixin.class.php';

class DefaultWeixin extends wxmessage {


    public function processRequest($data) {
        // $input is the content that user inputs
        $input = $data->Content;       
        // deal with text msg from user
        if ($this->isTextMsg()) {
            switch ($input) {
                case 'subscribe'://new user subscribes
                    $this->welcome();
                    break;
                case 'Hello2BizUser'://only available before March 26,2013
                    $this->welcome();
                    break;
                case 'news'://news
                    $this->fulinews();
                    break;
                case 'music':
                    $this->yishengmusic();
                    break;              
                case 'joke':
                   $this->xiaohua();
                   break;
	        case 'aipinpin':
		   $this->introduction();
	           break;
			/*	case '我的活动':
				   $this->re_activity():
				   break;
				case '我加入的';
				   $this->re_activity_join();
				   break;
				case '我发起的';
				   $this->re_activity_initiate();
				   break;*/
                default:
                   $this->text($input);
                   break;
                   
            }         
        }
        // deal with geographical location
        elseif ($this->isLocationMsg()) {
            $this->fulinews();
        } elseif ($this->isImageMsg()) {
            $this->fulinews();
        } elseif ($this->isLinkMsg()) {
            $this->fulinews();
        } elseif ($this->isEventMsg()) {
            switch ($data->Event) {
                //when user pressed button
            case "CLICK":
                $this->click($data);
                break;
            //case "JOIN":
            }
            
        } else {
            
        }
    }

    /**
     * Event message(button)
     */
    private function click($data) {
        $eventKey = $data->EventKey;
        switch ($eventKey) {
        case 'PUBLISH'://处理发布活动
            $this->gopublish($data);
            break;
        }
    }

    private function gopublish($data) {
        $post = array(
            array(
                'title' => '拼好活动',
                'discription' => '现在发布吧',
                'picurl' => 'https://raw.githubusercontent.com/ZhangQiaolun/PingPing/master/pic/party.jpg',
                'url' => 'http://lovepingping.applinzi.com/publish.php?user='  .$data->FromUserName,
            )
        );
        $this->outputNews($post);
    }

   
    /**
     * return news
     */
    private function fulinews() {
        $text = 'QQ黄钻、蓝钻、红钻、绿钻或10Q币任选其一';
        $posts = array(
            array(
                'title' => '福利来了',
                'discription' => $text,
                'picurl' => 'http://mmsns.qpic.cn/mmsns/XWia2Xj7RZ8mhQaESostBicFaX2HjVBbJYKKCBk9PkuicKrSZdfNL7XAw/0',
                'url' => 'http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5MDE4Njg2MQ==&appmsgid=10000009&itemidx=1#wechat_redirect',
            )
        );
        $xml = $this->outputNews($posts);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * return text
     */
    private function text($text) {
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * return jokes
     */
    private function xiaohua() {
        $text = "你好，亲爱的朋友，我可能不在电脑旁。先看个笑话吧。有个小姑娘穿了一件白色大衣在等车，一个熊孩子把巧克力雪糕整个拍她身上了，孩子他妈说对不起孩子很皮，姑娘蹲下身和蔼的说：小朋友，我们拉钩，以后谁在大马路上瞎闹谁就死全家好不好？孩子他妈吓尿了~";
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }
    
    /**
     * return 'aipinpin'
     */
     private function introduction() {
	 $text = "爱拼拼是一个在线的拼团平台。您可以在这里发布活动，召集志同道合的小伙伴一起吃喝玩乐，或者约图自习。希望爱拼拼能给您的校园生活带来便利与舒心！\n现在就发布您的第一个活动吧！";
	 $xml = $tihs->outputText($text);
	 header('Content-Type: application/xml');
	 echo $xml;
	}
	
	/**
	 * return '我的活动'
	 */
	/*private function re_activity($data){
	    $mysql = new SaeMysql();
		$openid = $this->escape($data->FromUserName);
		$sql1 = "SELECT 'user_id' , 'joiner_id'
		         FROM   'activity_user_joiner'
				 WHERE  'user_id' LIKE '{$openid}' , 'joiner_id' LIKE '{$openid}'
		         ORDER BY 'activity_time' desc";
		$result1 = $mysql->getData($sql1);
		
		//如果还没有发起或参加活动
		if  (empty($result1)){
			$text = "您还没有发起或参加过活动，现在开始尝试加入一个活动吧！";
			$xml = $this->outputText($text);
			header('Content-Type:application/xml');
			echo $xml;
		}
		
		//已经有过活动信息
		else{
		$sql2 = "SELECT 'id'
		         FROM 'activity'
				 WHERE 'id'  LIKE  '{$result1[0]['activity_id']}'";
		$result2 = $mysql->getData($sql2);
		$post = array( 
			array(
			    'title' => "即将开始的活动",
				'discription' => "活动名称：".$result2['activity_name']."\n".
				                 "活动时间：".$result2['activity_time']."\n".
								 "活动地点：".$result2['activity_place']."\n".
								 "活动描述：".$result2['activity_describe']."\n";				             
				'picurl' => "",
				'url' => "",
				)
			/*,array(
			'title' => "获取更多活动信息，请点击这里！",
			'discription' => "",
			'picurl' => "",
			'url' => "",                //加入这个用户的分页链接！！！
			)*/
    /*    ); 
        $this->outputNews($post); 
		}		
	}*/
	
	/**
	 * return '我加入的'
	 */
	/*private function re_activity_join($data){
		$openid = $this->escape($data->FromUserName);
		$sql1 = "SELECT joiner_id
		         FROM   'activity_user_joiner'
				 WHERE  'joiner_id'  LIKE  '{$openid}'
				 ORDER BY  'activity_time' desc";
	    $result1 = $mysql->getData($sql1);
		
		//如果还没有参加过活动
		if (empty($result1)){
			$text = "您还没有参加过活动，现在开始参加一个活动吧！";
			$xml = $this->outputText($text);
			header('Content-Type:application/xml');
			echo $xml;
		}
		
		//已经参加过活动
		else{
		$sql2 = "select 'id'
		         from 'activity'
				 where 'id'  like  '{$result1[0]['activity_id']}'";
		$result2 = $mysql->getData($sql2);
		$post = array( 
			array(
			    'title' => "我加入的活动",
				'discription' => "活动名称：".$result2['activity_name']."\n".
				                 "活动时间：".$result2['activity_time']."\n".
								 "活动地点：".$result2['activity_place']."\n".
								 "活动描述：".$result2['activity_describe']."\n";				             
				'picurl' => "",
				'url' => "",                    //    加入该活动的分页链接！！！
				)
			/*,array(
			'title' => "获取更多活动信息，请点击这里！",
			'discription' => "",
			'picurl' => "",
			'url' => "",                //加入这个用户的分页链接！！！
			)*/
     /*   ); 
        $this->outputNews($post);
		}
	}*/
	
	/**
	 * return '我发起的'
	 */
	/*private function re_activity_initiate($data){
		$openid = $this->escape($data->FromUserName);
		$sql1 = "SELECT 'user_id'
		         FROM   'activity_user_joiner'
				 WHERE  'user_id'  LIKE  '{$openid}'
				 ORDER BY  'activity_time' desc";
		$result1 = $mysql->getData($sql1);
		
		//如果还没有发起过活动
		if (empty($result1)){
			$text = "您还没有发起过活动，现在开始发布一个活动吧！";
			$xml = $this->outputText($text);
			header('Content-Type:application/xml');
			echo $xml;
		}
		
		//已经发布过活动
		else{
		$sql2 = "select 'id'
		         from 'activity'
				 where 'id'  like  '{$result1[0]['activity_id']}'";
		$result2 = $mysql->getData($sql2);
		$post = array( 
			array(
			    'title' => "我发起的活动",
				'discription' => "活动名称：".$result2['activity_name']."\n".
				                 "活动时间：".$result2['activity_time']."\n".
								 "活动地点：".$result2['activity_place']."\n".
								 "活动描述：".$result2['activity_describe']."\n";				             
				'picurl' => "",
				'url' => "",                    //    加入该活动的分页链接！！！
				)
			/*,array(
			'title' => "获取更多活动信息，请点击这里！",
			'discription' => "",
			'picurl' => "",
			'url' => "",                //加入这个用户的分页链接！！！
			)*/
       /* ); 
        $this->outputNews($post);
		}
	}*/
	
    /**
     * return welcome msg
     */
    private function welcome() {
        $text = "亲爱的朋友，欢迎关注爱拼拼。回复“aipinpin”获得关于我们的信息吧！";
        // outputText 用来返回文本信息
        $xml = $this->outputText($text);
        header('Content-Type: application/xml');
        echo $xml;
    }

    private function music() {
        $music = array(
            'title' => '在春天里',
            'discription' => '在春天里-汪峰',
            'musicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/inspring.wma',
            'hdmusicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/inspring.mp3'
        );
        $xml = $this->outputMusic($music);
        //sae_log($xml);
        header('Content-Type: application/xml');
        echo $xml;
    }

    private function yishengmusic() {
        $music = array(
            'title' => '一生所爱',
            'discription' => '为什么选这首歌呢？因为我的梦想是与一生所爱的人快乐一生。你的呢，亲爱的朋友？',
            'musicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/song/%E5%8D%A2%E5%86%A0%E5%BB%B7-%E4%B8%80%E7%94%9F%E6%89%80%E7%88%B1.mp3',
            'hdmusicurl' => 'http://rubyeye-rubyeye.stor.sinaapp.com/song/%E5%8D%A2%E5%86%A0%E5%BB%B7-%E4%B8%80%E7%94%9F%E6%89%80%E7%88%B1.mp3'
        );
        $xml = $this->outputMusic($music);
        header('Content-Type: application/xml');
        echo $xml;
    }

    /**
     * Pre processing，common usage:save the request into your database.
	 * Because weixin save your msgs only 5 days.
     * @return boolean
     */
    protected function beforeProcess($postData) {

        return true;
    }

    protected function afterProcess() {
    }

    public function errorHandler($errno, $error, $file = '', $line = 0) {
        $msg = sprintf('%s - %s - %s - %s', $errno, $error, $file, $line);
    }

    public function errorException(Exception $e) {
        $msg = sprintf('%s - %s - %s - %s', $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
    }

    private function saveRequest($request) {
        
    }

}




