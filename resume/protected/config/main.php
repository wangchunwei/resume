<?php

return array(
    //'name'=>'Resume Game',
	'defaultController'=>'site',    
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'game/guess/<g:\w>'=>'game/guess',
                'resume/index/<g:\w>'=>'resume/index',
			),
		),
	),
);