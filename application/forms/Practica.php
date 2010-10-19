<?php
class Form_Practica extends Zend_Form{
			public $elementsDecorators = array(
			'ViewHelper',
			'Errors',
			array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
			array('Label', array('tag' => 'td')),
			array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
			);

			public $buttonsDecorators = array(
				'ViewHelper',
				array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'button')),
				//array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
				//array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
			);

	public function loadDefaultDecorators(){
			$this->setDecorators(array(
				'FormElements',
				array('HtmlTag', array('tag' => 'table')),
				'Form',
			));
		}
	public function __construct($options = null){
			parent::__construct($options);
			
			$this->setName('practica');
			$id = new Zend_Form_Element_Hidden('id'); 
			
			$idPersona = new Zend_Form_Element_Text('idPersona');
			$idPersona->setLabel('Persona Id')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$ano = new Zend_Form_Element_Text('ano');
			$ano->setLabel('Ano')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$periodo = new Zend_Form_Element_Select('periodo');
			$periodo->setLabel('Periodo')
			->setDecorators($this->elementsDecorators)
			->setmultioptions(array('I' =>'I', 'II'=>'II'))
			->setRequired(true);
			
			$semestre = new Zend_Form_Element_Select('semestre');
			$semestre->setLabel('Semestre')
			->setDecorators($this->elementsDecorators)
			->setmultioptions(array('1' =>'I', '2'=>'II','3' =>'III', '4'=>'IV','5' =>'V', '6'=>'VI','7' =>'VII', '8'=>'VIII','9' =>'IX', '10'=>'X','NA' => 'NA'))
			->setRequired(true);
			
			$pais_origen = new Zend_Form_Element_Select('pais_origen');
			$pais_origen->setLabel('Pais de Origen')
			->setDecorators($this->elementsDecorators)
			->setmultioptions(array('Afganist�n'=>'Afganist�n',
									'Islas Aland '=>'Islas Aland ',
									'Albania'=>'Albania',
									'Argelia'=>'Argelia',
									'Samoa Americana'=>'Samoa Americana',
									'Andorra'=>'Andorra',
									'Angola'=>'Angola',
									'Anguila'=>'Anguila',
									'Ant�rtida'=>'Ant�rtida',
									'Antigua y Barbuda'=>'Antigua y Barbuda',
									'Argentina'=>'Argentina',
									'Armenia'=>'Armenia',
									'Aruba'=>'Aruba',
									'Australia'=>'Australia',
									'Austria'=>'Austria',
									'Azerbaiy�n'=>'Azerbaiy�n',
									'Bahamas'=>'Bahamas',
									'Bahr�in'=>'Bahr�in',
									'Bangladesh'=>'Bangladesh',
									'Barbados'=>'Barbados',
									'Bielorusia'=>'Bielorusia',
									'B�lgica'=>'B�lgica',
									'Belice'=>'Belice',
									'Benin'=>'Benin',
									'Bermuda'=>'Bermuda',
									'But�n'=>'But�n',
									'Bolivia'=>'Bolivia',
									'Bosnia y Herzegovina'=>'Bosnia y Herzegovina',
									'Botswana'=>'Botswana',
									'Isla Bouvet'=>'Isla Bouvet',
									'Brasil'=>'Brasil',
									'Territorio Brit�nico en el Oc�ano Indico'=>'Territorio Brit�nico en el Oc�ano Indico',
									'Islas V�rgenes (Reino Unido)'=>'Islas V�rgenes (Reino Unido)',
									'Brunei'=>'Brunei',
									'Bulgaria'=>'Bulgaria',
									'Burkina Faso'=>'Burkina Faso',
									'Burundi'=>'Burundi',
									'Camboya'=>'Camboya',
									'Camer�n'=>'Camer�n',
									'Canad�'=>'Canad�',
									'Cabo Verde'=>'Cabo Verde',
									'Islas Caim�n'=>'Islas Caim�n',
									'Rep�blica Centroafricana'=>'Rep�blica Centroafricana',
									'Chad'=>'Chad',
									'Chile'=>'Chile',
									'China'=>'China',
									'Isla de Navidad'=>'Isla de Navidad',
									'Islas Cocos (Keeling)'=>'Islas Cocos (Keeling)',
									'Colombia'=>'Colombia',
									'Comores'=>'Comores',
									'Congo'=>'Congo',
									'Islas Cook'=>'Islas Cook',
									'Costa Rica'=>'Costa Rica',
									'Croacia'=>'Croacia',
									'Cuba'=>'Cuba',
									'Chipre'=>'Chipre',
									'Rep�blica Checa'=>'Rep�blica Checa',
									'Rep�blica Democr�tica del Congo'=>'Rep�blica Democr�tica del Congo',
									'Dinamarca'=>'Dinamarca',
									'Territorio en disputa'=>'Territorio en disputa',
									'Djibouti'=>'Djibouti',
									'Dominica'=>'Dominica',
									'Rep�blica Dominicana'=>'Rep�blica Dominicana',
									'Timor Occidental'=>'Timor Occidental',
									'Ecuador'=>'Ecuador',
									'Egipto'=>'Egipto',
									'El Salvador'=>'El Salvador',
									'Guinea Ecuatorial'=>'Guinea Ecuatorial',
									'Eritrea'=>'Eritrea',
									'Estonia'=>'Estonia',
									'Etiop�a'=>'Etiop�a',
									'Islas Malvinas'=>'Islas Malvinas',
									'Islas Faroe'=>'Islas Faroe',
									'Estados Federados de Micronesia'=>'Estados Federados de Micronesia',
									'Fiji'=>'Fiji',
									'Finlandia'=>'Finlandia',
									'Francia'=>'Francia',
									'Guayana Francesa'=>'Guayana Francesa',
									'Polinesia Francesa'=>'Polinesia Francesa',
									'Territorios Franceses del Sur'=>'Territorios Franceses del Sur',
									'Gab�n'=>'Gab�n',
									'Gambia'=>'Gambia',
									'Georgia'=>'Georgia',
									'Alemania'=>'Alemania',
									'Ghana'=>'Ghana',
									'Gibraltar'=>'Gibraltar',
									'Grecia'=>'Grecia',
									'Groenlandia'=>'Groenlandia',
									'Grenada'=>'Grenada',
									'Guadalupe'=>'Guadalupe',
									'Guam'=>'Guam',
									'Guatemala'=>'Guatemala',
									'Guinea'=>'Guinea',
									'Guinea-Bissau'=>'Guinea-Bissau',
									'Guyana'=>'Guyana',
									'Hait�'=>'Hait�',
									'Islas Heard y McDonald'=>'Islas Heard y McDonald',
									'Honduras'=>'Honduras',
									'Hong Kong'=>'Hong Kong',
									'Hungr�a'=>'Hungr�a',
									'Islandia'=>'Islandia',
									'India'=>'India',
									'Indonesia'=>'Indonesia',
									'Ir�n'=>'Ir�n',
									'Iraq'=>'Iraq',
									'Zona neutra Iraq-Arabia Saud�'=>'Zona neutra Iraq-Arabia Saud�',
									'Irlanda'=>'Irlanda',
									'Israel'=>'Israel',
									'Italia'=>'Italia',
									'Costa de Marfil'=>'Costa de Marfil',
									'Jamaica'=>'Jamaica',
									'Jap�n'=>'Jap�n',
									'Jordania'=>'Jordania',
									'Kazajst�n'=>'Kazajst�n',
									'Kenia'=>'Kenia',
									'Kiribati'=>'Kiribati',
									'Kuwait'=>'Kuwait',
									'Kirguist�n'=>'Kirguist�n',
									'Laos'=>'Laos',
									'Letonia'=>'Letonia',
									'L�bano'=>'L�bano',
									'Lesotho'=>'Lesotho',
									'Liberia'=>'Liberia',
									'Libia'=>'Libia',
									'Liechtenstein'=>'Liechtenstein',
									'Lituania'=>'Lituania',
									'Luxemburgo'=>'Luxemburgo',
									'Macau'=>'Macau',
									'Macedonia'=>'Macedonia',
									'Madagascar'=>'Madagascar',
									'Malawi'=>'Malawi',
									'Malasia'=>'Malasia',
									'Maldivas'=>'Maldivas',
									'Mali'=>'Mali',
									'Malta'=>'Malta',
									'Islas Marshall'=>'Islas Marshall',
									'Martinica'=>'Martinica',
									'Mauritania'=>'Mauritania',
									'Mauricio'=>'Mauricio',
									'Mayotte'=>'Mayotte',
									'M�xico'=>'M�xico',
									'Moldova'=>'Moldova',
									'M�naco'=>'M�naco',
									'Mongolia'=>'Mongolia',
									'Montserrat'=>'Montserrat',
									'Marruecos'=>'Marruecos',
									'Mozambique'=>'Mozambique',
									'Myanmar'=>'Myanmar',
									'Namibia'=>'Namibia',
									'Nauru'=>'Nauru',
									'Nepal'=>'Nepal',
									'Pa�ses Bajos'=>'Pa�ses Bajos',
									'Antillas Holandesas'=>'Antillas Holandesas',
									'Nueva Caledonia'=>'Nueva Caledonia',
									'Nueva Zelanda'=>'Nueva Zelanda',
									'Nicaragua'=>'Nicaragua',
									'N�ger'=>'N�ger',
									'Nigeria'=>'Nigeria',
									'Niue'=>'Niue',
									'Isla Norfolk'=>'Isla Norfolk',
									'Corea del Norte'=>'Corea del Norte',
									'Islas Mariana del Norte'=>'Islas Mariana del Norte',
									'Noruega'=>'Noruega',
									'Om�n'=>'Om�n',
									'Pakist�n'=>'Pakist�n',
									'Palau'=>'Palau',
									'Territorios Palestinos Ocupados'=>'Territorios Palestinos Ocupados',
									'Panam�'=>'Panam�',
									'Pap�a-Nueva Guinea'=>'Pap�a-Nueva Guinea',
									'Paraguay'=>'Paraguay',
									'Per�'=>'Per�',
									'Filipinas'=>'Filipinas',
									'Islas Pitcairn'=>'Islas Pitcairn',
									'Polonia'=>'Polonia',
									'Portugal'=>'Portugal',
									'Puerto Rico'=>'Puerto Rico',
									'Qatar'=>'Qatar',
									'Reuni�n'=>'Reuni�n',
									'Ruman�a'=>'Ruman�a',
									'Rusia'=>'Rusia',
									'Ruanda'=>'Ruanda',
									'Santa Elena y Dependencias'=>'Santa Elena y Dependencias',
									'Saint Kitts y Nevis'=>'Saint Kitts y Nevis',
									'Santa Luc�a'=>'Santa Luc�a',
									'San Pedro y Miquel�n'=>'San Pedro y Miquel�n',
									'San Vicente y Granadinas'=>'San Vicente y Granadinas',
									'Samoa'=>'Samoa',
									'San Marino'=>'San Marino',
									'Santo Tom� y Pr�ncipe'=>'Santo Tom� y Pr�ncipe',
									'Arabia Saud�'=>'Arabia Saud�',
									'Senegal'=>'Senegal',
									'Serbia y Montenegro'=>'Serbia y Montenegro',
									'Seychelles'=>'Seychelles',
									'Sierra Leona'=>'Sierra Leona',
									'Singapur'=>'Singapur',
									'Eslovaquia'=>'Eslovaquia',
									'Eslovenia'=>'Eslovenia',
									'Islas Salom�n'=>'Islas Salom�n',
									'Somalia'=>'Somalia',
									'Sud�frica'=>'Sud�frica',
									'Islas Georgia del Sur e Islas Sandwich del Sur'=>'Islas Georgia del Sur e Islas Sandwich del Sur',
									'Corea del Sur'=>'Corea del Sur',
									'Espa�a'=>'Espa�a',
									'Islas Spratly'=>'Islas Spratly',
									'Sri Lanka'=>'Sri Lanka',
									'Sud�n'=>'Sud�n',
									'Surin�m'=>'Surin�m',
									'Islas Svalbard y Jan Mayen'=>'Islas Svalbard y Jan Mayen',
									'Swazilandia'=>'Swazilandia',
									'Suecia'=>'Suecia',
									'Suiza'=>'Suiza',
									'Siria'=>'Siria',
									'Taiw�n'=>'Taiw�n',
									'Tayikist�n'=>'Tayikist�n',
									'Tanzania'=>'Tanzania',
									'Tailandia'=>'Tailandia',
									'Togo'=>'Togo',
									'Tokelau'=>'Tokelau',
									'Tonga'=>'Tonga',
									'Trinidad y Tobago'=>'Trinidad y Tobago',
									'T�nez'=>'T�nez',
									'Turqu�a'=>'Turqu�a',
									'Turkmenist�n'=>'Turkmenist�n',
									'Islas Turks y Caicos'=>'Islas Turks y Caicos',
									'Tuvalu'=>'Tuvalu',
									'Uganda'=>'Uganda',
									'Ucrania'=>'Ucrania',
									'Emiratos �rabes Unidos'=>'Emiratos �rabes Unidos',
									'Reino Unido'=>'Reino Unido',
									'Zona neutra de las Naciones Unidas'=>'Zona neutra de las Naciones Unidas',
									'Estados Unidos'=>'Estados Unidos',
									'Islas Menores de los Estados Unidos'=>'Islas Menores de los Estados Unidos',
									'Uruguay'=>'Uruguay',
									'Islas V�rgenes de los Estados Unidos'=>'Islas V�rgenes de los Estados Unidos',
									'Uzbekist�n'=>'Uzbekist�n',
									'Vanuatu'=>'Vanuatu',
									'Vaticano'=>'Vaticano',
									'Venezuela'=>'Venezuela',
									'Vietn�m'=>'Vietn�m',
									'Wallis y Futuna'=>'Wallis y Futuna',
									'S�hara Occidental'=>'S�hara Occidental',
									'Yemen'=>'Yemen',
									'Zambia'=>'Zambia',
									'Zimbabwe'=>'Zimbabwe')
							)
							->setRequired(true);
			
			
			$institucion_origen = new Zend_Form_Element_Text('institucion_origen');
			$institucion_origen->setLabel('Institucion Origen')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$pais_destino = new Zend_Form_Element_Select('pais_destino');
			$pais_destino->setLabel('Pais Destino')
			->setDecorators($this->elementsDecorators)
			->setmultioptions(array('Afganist�n'=>'Afganist�n',
									'Islas Aland '=>'Islas Aland ',
									'Albania'=>'Albania',
									'Argelia'=>'Argelia',
									'Samoa Americana'=>'Samoa Americana',
									'Andorra'=>'Andorra',
									'Angola'=>'Angola',
									'Anguila'=>'Anguila',
									'Ant�rtida'=>'Ant�rtida',
									'Antigua y Barbuda'=>'Antigua y Barbuda',
									'Argentina'=>'Argentina',
									'Armenia'=>'Armenia',
									'Aruba'=>'Aruba',
									'Australia'=>'Australia',
									'Austria'=>'Austria',
									'Azerbaiy�n'=>'Azerbaiy�n',
									'Bahamas'=>'Bahamas',
									'Bahr�in'=>'Bahr�in',
									'Bangladesh'=>'Bangladesh',
									'Barbados'=>'Barbados',
									'Bielorusia'=>'Bielorusia',
									'B�lgica'=>'B�lgica',
									'Belice'=>'Belice',
									'Benin'=>'Benin',
									'Bermuda'=>'Bermuda',
									'But�n'=>'But�n',
									'Bolivia'=>'Bolivia',
									'Bosnia y Herzegovina'=>'Bosnia y Herzegovina',
									'Botswana'=>'Botswana',
									'Isla Bouvet'=>'Isla Bouvet',
									'Brasil'=>'Brasil',
									'Territorio Brit�nico en el Oc�ano Indico'=>'Territorio Brit�nico en el Oc�ano Indico',
									'Islas V�rgenes (Reino Unido)'=>'Islas V�rgenes (Reino Unido)',
									'Brunei'=>'Brunei',
									'Bulgaria'=>'Bulgaria',
									'Burkina Faso'=>'Burkina Faso',
									'Burundi'=>'Burundi',
									'Camboya'=>'Camboya',
									'Camer�n'=>'Camer�n',
									'Canad�'=>'Canad�',
									'Cabo Verde'=>'Cabo Verde',
									'Islas Caim�n'=>'Islas Caim�n',
									'Rep�blica Centroafricana'=>'Rep�blica Centroafricana',
									'Chad'=>'Chad',
									'Chile'=>'Chile',
									'China'=>'China',
									'Isla de Navidad'=>'Isla de Navidad',
									'Islas Cocos (Keeling)'=>'Islas Cocos (Keeling)',
									'Colombia'=>'Colombia',
									'Comores'=>'Comores',
									'Congo'=>'Congo',
									'Islas Cook'=>'Islas Cook',
									'Costa Rica'=>'Costa Rica',
									'Croacia'=>'Croacia',
									'Cuba'=>'Cuba',
									'Chipre'=>'Chipre',
									'Rep�blica Checa'=>'Rep�blica Checa',
									'Rep�blica Democr�tica del Congo'=>'Rep�blica Democr�tica del Congo',
									'Dinamarca'=>'Dinamarca',
									'Territorio en disputa'=>'Territorio en disputa',
									'Djibouti'=>'Djibouti',
									'Dominica'=>'Dominica',
									'Rep�blica Dominicana'=>'Rep�blica Dominicana',
									'Timor Occidental'=>'Timor Occidental',
									'Ecuador'=>'Ecuador',
									'Egipto'=>'Egipto',
									'El Salvador'=>'El Salvador',
									'Guinea Ecuatorial'=>'Guinea Ecuatorial',
									'Eritrea'=>'Eritrea',
									'Estonia'=>'Estonia',
									'Etiop�a'=>'Etiop�a',
									'Islas Malvinas'=>'Islas Malvinas',
									'Islas Faroe'=>'Islas Faroe',
									'Estados Federados de Micronesia'=>'Estados Federados de Micronesia',
									'Fiji'=>'Fiji',
									'Finlandia'=>'Finlandia',
									'Francia'=>'Francia',
									'Guayana Francesa'=>'Guayana Francesa',
									'Polinesia Francesa'=>'Polinesia Francesa',
									'Territorios Franceses del Sur'=>'Territorios Franceses del Sur',
									'Gab�n'=>'Gab�n',
									'Gambia'=>'Gambia',
									'Georgia'=>'Georgia',
									'Alemania'=>'Alemania',
									'Ghana'=>'Ghana',
									'Gibraltar'=>'Gibraltar',
									'Grecia'=>'Grecia',
									'Groenlandia'=>'Groenlandia',
									'Grenada'=>'Grenada',
									'Guadalupe'=>'Guadalupe',
									'Guam'=>'Guam',
									'Guatemala'=>'Guatemala',
									'Guinea'=>'Guinea',
									'Guinea-Bissau'=>'Guinea-Bissau',
									'Guyana'=>'Guyana',
									'Hait�'=>'Hait�',
									'Islas Heard y McDonald'=>'Islas Heard y McDonald',
									'Honduras'=>'Honduras',
									'Hong Kong'=>'Hong Kong',
									'Hungr�a'=>'Hungr�a',
									'Islandia'=>'Islandia',
									'India'=>'India',
									'Indonesia'=>'Indonesia',
									'Ir�n'=>'Ir�n',
									'Iraq'=>'Iraq',
									'Zona neutra Iraq-Arabia Saud�'=>'Zona neutra Iraq-Arabia Saud�',
									'Irlanda'=>'Irlanda',
									'Israel'=>'Israel',
									'Italia'=>'Italia',
									'Costa de Marfil'=>'Costa de Marfil',
									'Jamaica'=>'Jamaica',
									'Jap�n'=>'Jap�n',
									'Jordania'=>'Jordania',
									'Kazajst�n'=>'Kazajst�n',
									'Kenia'=>'Kenia',
									'Kiribati'=>'Kiribati',
									'Kuwait'=>'Kuwait',
									'Kirguist�n'=>'Kirguist�n',
									'Laos'=>'Laos',
									'Letonia'=>'Letonia',
									'L�bano'=>'L�bano',
									'Lesotho'=>'Lesotho',
									'Liberia'=>'Liberia',
									'Libia'=>'Libia',
									'Liechtenstein'=>'Liechtenstein',
									'Lituania'=>'Lituania',
									'Luxemburgo'=>'Luxemburgo',
									'Macau'=>'Macau',
									'Macedonia'=>'Macedonia',
									'Madagascar'=>'Madagascar',
									'Malawi'=>'Malawi',
									'Malasia'=>'Malasia',
									'Maldivas'=>'Maldivas',
									'Mali'=>'Mali',
									'Malta'=>'Malta',
									'Islas Marshall'=>'Islas Marshall',
									'Martinica'=>'Martinica',
									'Mauritania'=>'Mauritania',
									'Mauricio'=>'Mauricio',
									'Mayotte'=>'Mayotte',
									'M�xico'=>'M�xico',
									'Moldova'=>'Moldova',
									'M�naco'=>'M�naco',
									'Mongolia'=>'Mongolia',
									'Montserrat'=>'Montserrat',
									'Marruecos'=>'Marruecos',
									'Mozambique'=>'Mozambique',
									'Myanmar'=>'Myanmar',
									'Namibia'=>'Namibia',
									'Nauru'=>'Nauru',
									'Nepal'=>'Nepal',
									'Pa�ses Bajos'=>'Pa�ses Bajos',
									'Antillas Holandesas'=>'Antillas Holandesas',
									'Nueva Caledonia'=>'Nueva Caledonia',
									'Nueva Zelanda'=>'Nueva Zelanda',
									'Nicaragua'=>'Nicaragua',
									'N�ger'=>'N�ger',
									'Nigeria'=>'Nigeria',
									'Niue'=>'Niue',
									'Isla Norfolk'=>'Isla Norfolk',
									'Corea del Norte'=>'Corea del Norte',
									'Islas Mariana del Norte'=>'Islas Mariana del Norte',
									'Noruega'=>'Noruega',
									'Om�n'=>'Om�n',
									'Pakist�n'=>'Pakist�n',
									'Palau'=>'Palau',
									'Territorios Palestinos Ocupados'=>'Territorios Palestinos Ocupados',
									'Panam�'=>'Panam�',
									'Pap�a-Nueva Guinea'=>'Pap�a-Nueva Guinea',
									'Paraguay'=>'Paraguay',
									'Per�'=>'Per�',
									'Filipinas'=>'Filipinas',
									'Islas Pitcairn'=>'Islas Pitcairn',
									'Polonia'=>'Polonia',
									'Portugal'=>'Portugal',
									'Puerto Rico'=>'Puerto Rico',
									'Qatar'=>'Qatar',
									'Reuni�n'=>'Reuni�n',
									'Ruman�a'=>'Ruman�a',
									'Rusia'=>'Rusia',
									'Ruanda'=>'Ruanda',
									'Santa Elena y Dependencias'=>'Santa Elena y Dependencias',
									'Saint Kitts y Nevis'=>'Saint Kitts y Nevis',
									'Santa Luc�a'=>'Santa Luc�a',
									'San Pedro y Miquel�n'=>'San Pedro y Miquel�n',
									'San Vicente y Granadinas'=>'San Vicente y Granadinas',
									'Samoa'=>'Samoa',
									'San Marino'=>'San Marino',
									'Santo Tom� y Pr�ncipe'=>'Santo Tom� y Pr�ncipe',
									'Arabia Saud�'=>'Arabia Saud�',
									'Senegal'=>'Senegal',
									'Serbia y Montenegro'=>'Serbia y Montenegro',
									'Seychelles'=>'Seychelles',
									'Sierra Leona'=>'Sierra Leona',
									'Singapur'=>'Singapur',
									'Eslovaquia'=>'Eslovaquia',
									'Eslovenia'=>'Eslovenia',
									'Islas Salom�n'=>'Islas Salom�n',
									'Somalia'=>'Somalia',
									'Sud�frica'=>'Sud�frica',
									'Islas Georgia del Sur e Islas Sandwich del Sur'=>'Islas Georgia del Sur e Islas Sandwich del Sur',
									'Corea del Sur'=>'Corea del Sur',
									'Espa�a'=>'Espa�a',
									'Islas Spratly'=>'Islas Spratly',
									'Sri Lanka'=>'Sri Lanka',
									'Sud�n'=>'Sud�n',
									'Surin�m'=>'Surin�m',
									'Islas Svalbard y Jan Mayen'=>'Islas Svalbard y Jan Mayen',
									'Swazilandia'=>'Swazilandia',
									'Suecia'=>'Suecia',
									'Suiza'=>'Suiza',
									'Siria'=>'Siria',
									'Taiw�n'=>'Taiw�n',
									'Tayikist�n'=>'Tayikist�n',
									'Tanzania'=>'Tanzania',
									'Tailandia'=>'Tailandia',
									'Togo'=>'Togo',
									'Tokelau'=>'Tokelau',
									'Tonga'=>'Tonga',
									'Trinidad y Tobago'=>'Trinidad y Tobago',
									'T�nez'=>'T�nez',
									'Turqu�a'=>'Turqu�a',
									'Turkmenist�n'=>'Turkmenist�n',
									'Islas Turks y Caicos'=>'Islas Turks y Caicos',
									'Tuvalu'=>'Tuvalu',
									'Uganda'=>'Uganda',
									'Ucrania'=>'Ucrania',
									'Emiratos �rabes Unidos'=>'Emiratos �rabes Unidos',
									'Reino Unido'=>'Reino Unido',
									'Zona neutra de las Naciones Unidas'=>'Zona neutra de las Naciones Unidas',
									'Estados Unidos'=>'Estados Unidos',
									'Islas Menores de los Estados Unidos'=>'Islas Menores de los Estados Unidos',
									'Uruguay'=>'Uruguay',
									'Islas V�rgenes de los Estados Unidos'=>'Islas V�rgenes de los Estados Unidos',
									'Uzbekist�n'=>'Uzbekist�n',
									'Vanuatu'=>'Vanuatu',
									'Vaticano'=>'Vaticano',
									'Venezuela'=>'Venezuela',
									'Vietn�m'=>'Vietn�m',
									'Wallis y Futuna'=>'Wallis y Futuna',
									'S�hara Occidental'=>'S�hara Occidental',
									'Yemen'=>'Yemen',
									'Zambia'=>'Zambia',
									'Zimbabwe'=>'Zimbabwe')
							)
							->setRequired(true);
			
			
			$institucion_destino = new Zend_Form_Element_Text('institucion_destino');
			$institucion_destino->setLabel('Institucion de Destino')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$duracion = new Zend_Form_Element_Text('duracion');
			$duracion->setLabel('Duracion(Meses)')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$facultad_dependencia = new Zend_Form_Element_Text('facultad_dependencia');
			$facultad_dependencia->setLabel('Facultad / Dependencia')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
					
			$programa = new Zend_Form_Element_Text('programa');
			$programa->setLabel('Programa')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$remuneracion = new Zend_Form_Element_Radio('remuneracion');
			$remuneracion->setLabel('Remuneracion?')
			->setDecorators($this->elementsDecorators)
			->addMultiOption('1', 'SI')
			->addMultiOption('0', 'NO')
			->setRequired(true);
			
			$cantidad = new Zend_Form_Element_Text('cantidad');
			$cantidad->setLabel('Remuneracion ($USD):')
			->setDecorators($this->elementsDecorators)
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('id', 'submitbutton')
			->setDecorators($this->buttonsDecorators);
			
			$reset = new Zend_Form_Element_Reset('reset');
			$reset->setLabel('Cancelar')
			->setDecorators($this->buttonsDecorators)
			->setAttrib('onclick', 'history.back(-1);');
			
			$this->addElements(array($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $facultad_dependencia, $programa, $remuneracion, $cantidad, $submit, $reset));
		}
}
?>