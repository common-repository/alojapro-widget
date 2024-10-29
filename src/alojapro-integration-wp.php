<?php

	session_start();

	$integration_settings = get_option('alojapro_integration');

	/**
	* shortcode_booking()
	* manage all booking proccess steps, 
	* search, booking, step1, ....
	*/
	function shortcode_booking_process() {

		global $integration_settings;
				
        $method = "search";
		
        if(isset($_REQUEST['method'])) {
            $method = $_REQUEST['method'];
        }
		          
        if($method == 'search') {
								
            return call('search', 'POST', $_REQUEST, $integration_settings['scriptNameBooking']);

        }

        if($method == 'step1') {

            return call('step1', 'POST', $_REQUEST, $integration_settings['scriptNameBooking']);

        }
		
        if($method == 'step2') {

            return call('step2', 'POST', $_REQUEST, $integration_settings['scriptNameBooking']);

        }
		
		if($method == 'step3') {

            return call('step3', 'POST', $_REQUEST, $integration_settings['scriptNameBooking']);

        }
		
		if($method == 'step3-detail') {

            return call('step3-detail', 'POST', $_REQUEST, $integration_settings['scriptNameBooking']);

        }
				
	}
	
	/**
	* shortcode_booking()
	* manage all booking proccess steps, 
	* search, booking, step1, ....
	*/
	function shortcode_giftbox_process() {

		global $integration_settings;
												
        $method = "search";
		
        if(isset($_REQUEST['method'])) {
            $method = $_REQUEST['method'];
        }
						        
        if($method == 'search') {
								
            return call('giftbox', 'POST', $_REQUEST, $integration_settings['scriptNameGiftbox']);

        }
				
		if($method == 'step1') {
												
            return call('giftbox/step1', 'POST', $_REQUEST, $integration_settings['scriptNameGiftbox']);

        }
							
		if($method == 'step2') {
			
			// FIX submit form ?¿?			
			$data = array_merge($_POST, $_GET);
			$data['name'] = $data['customer-name'];
															
            return call('giftbox/step2', 'POST', $data, $integration_settings['scriptNameGiftbox']);

        }
		
		if($method == 'step3') {
												
            return call('giftbox/step3', 'POST', $_REQUEST, $integration_settings['scriptNameGiftbox']);

        }
			
	}

	/**
	* shortcode_activities()
	* manage all activities proccess steps, 
	* search, activities, step1, ....
	*/
	function shortcode_activities_process() {

		global $integration_settings;
												
        $method = "search";
		
        if(isset($_REQUEST['method'])) {
            $method = $_REQUEST['method'];
        }
						        
        if($method == 'search') {
								
            return call('activities', 'POST', $_REQUEST, $integration_settings['scriptNameActivities']);

        }
				
		if($method == 'step1') {
												
            return call('activities/step1', 'POST', $_REQUEST, $integration_settings['scriptNameActivities']);

        }
							
		if($method == 'step2') {
			
			// FIX submit form ?¿?			
			$data = array_merge($_POST, $_GET);
			$data['name'] = $data['customer-name'];
															
            return call('activities/step2', 'POST', $data, $integration_settings['scriptNameActivities']);

        }
		
		if($method == 'step3') {
												
        	return call('activities/step3', 'POST', $_REQUEST, $integration_settings['scriptNameActivities']);

        }
			
	}

	/**
	* show form code for widget
	* normaly use alojapro widget WP plugin
	*/
	function shortcode_booking_widget() {

		return '<div style="width:100%">
		<form name="frm-widget-3" method="post" action="/booking">
			<p>login <input type="text" id="login" name="login" value="peticiones@alojapro.com" /></p>
			<p>password <input type="text" id="password" name="password" value="$2y$10$I3v9bP5SRW/RtuW57dA.S.eabQrhZTFzu1qoguz6K3VtbltZWW4yq" /></p>
			<p>platformId <input type="text" id="platformId" name="platformId" value="2" /></p>
			<p>widgetId <input type="text" id="widgetId" name="widgetId" value="21" /></p>
			<p>roomsCfg <input type="text" id="roomsCfg" name="roomsCfg" value="1-2-0" /></p>    
			<p>firstSearch <input type="text" id="firstSearch" name="firstSearch" value="true" /></p>    
			<p>currency <input type="text" id="currency" name="currency" value="1" /></p>    
			<p>propertyId <input type="text" id="propertyId" name="propertyId" value="" /></p>    
			<p>from <input type="text" id="from" name="from" value="'.date('d/m/Y').'" /></p>
			<p>to <input type="text" id="to" name="to" value="'.date('d/m/Y').'" /></p>
			<p><button type="submit">Buscar</button></p>
		</form></div>';
				
	}
	
	/**
	* show form code for widget
	* normaly use alojapro widget WP plugin
	*/
	function shortcode_giftbox_widget() {

		return '<div style="width:100%">
		<form name="frm-widget-3" method="post" action="/giftbox">
			<p>login <input type="text" id="login" name="login" value="peticiones@alojapro.com" /></p>
			<p>password <input type="text" id="password" name="password" value="$2y$10$I3v9bP5SRW/RtuW57dA.S.eabQrhZTFzu1qoguz6K3VtbltZWW4yq" /></p>
			<p>platformId <input type="text" id="platformId" name="platformId" value="2" /></p>
			<p>widgetId <input type="text" id="widgetId" name="widgetId" value="21" /></p>			
			<p>firstSearch <input type="text" id="firstSearch" name="firstSearch" value="true" /></p>    			
			<p><button type="submit">Buscar</button></p>
		</form></div>';
				
	}

	/**
	* show form code for widget
	* normaly use alojapro widget WP plugin
	*/
	function shortcode_activities_widget() {

		return '<div style="width:100%">
		<form name="frm-widget-3" method="post" action="/activities">
			<p>login <input type="text" id="login" name="login" value="peticiones@alojapro.com" /></p>
			<p>password <input type="text" id="password" name="password" value="$2y$10$I3v9bP5SRW/RtuW57dA.S.eabQrhZTFzu1qoguz6K3VtbltZWW4yq" /></p>
			<p>platformId <input type="text" id="platformId" name="platformId" value="2" /></p>
			<p>widgetId <input type="text" id="widgetId" name="widgetId" value="21" /></p>			
			<p>firstSearch <input type="text" id="firstSearch" name="firstSearch" value="true" /></p>    			
			<p><button type="submit">Buscar</button></p>
		</form></div>';
				
	}
	
	/**
	 * call to widget3 component
	 */
	function call($method, $type, $params, $settings) {

		global $integration_settings;

		$url = $integration_settings['widgetUrl'] . '/' . $method;

		$xSessionId = session_id();

		if ($xSessionId == "") {
			$xSessionId = wp_get_session_token();
		}

		$locale = explode('_', get_locale());

		$headers = [
			// origin session id
			'X-SessionId: ' . $xSessionId,
			// url origin for the requests
			'X-OriginUrl: ' . $integration_settings['originUrl'],
			// booking, booking.php, etc...
			'X-ScriptName: ' . $settings,
			//'X-Language: '.$locale[0],
			'X-Language: en',
			'X-Currency: 1',
		];

		// Create curl object
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		// for post method
		if ($type == 'POST') {

			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);

		}

		// Exec the call
		$response = curl_exec($ch);

		return $response;

	}
	
	add_shortcode('booking_widget', 'shortcode_booking_widget');
	
	add_shortcode('booking_process', 'shortcode_booking_process');
	
	add_shortcode('giftbox_widget', 'shortcode_giftbox_widget');
	
	add_shortcode('giftbox_process', 'shortcode_giftbox_process');

	add_shortcode('activities_widget', 'shortcode_activities_widget');
	
	add_shortcode('activities_process', 'shortcode_activities_process');