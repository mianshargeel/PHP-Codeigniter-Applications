<?php
	$config = [
		'add_article_rules' =>  [
									[

									'field'   =>    'title',
									'label'   =>    'Article Title',
									'rules'   =>    'required'

									],

									[

									'field'   =>     'body',
									'label'   =>     'Article Body',
									'rules'   =>     'required'

									]
								],

		'admin_login_rules' =>  [

									[

									'field'   =>      'username',
									'label'   =>      'User Name',
									'rules'   =>      'required|trim|alpha'

									],

									[

									'field'   =>      'password',
									'label'   =>      'PasswoRD',
									'rules'   =>      'required'

									]

								]
	];

?>