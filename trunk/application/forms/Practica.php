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
			->setmultioptions(array('Afganistán'=>'Afganistán',
									'Islas Aland '=>'Islas Aland ',
									'Albania'=>'Albania',
									'Argelia'=>'Argelia',
									'Samoa Americana'=>'Samoa Americana',
									'Andorra'=>'Andorra',
									'Angola'=>'Angola',
									'Anguila'=>'Anguila',
									'Antártida'=>'Antártida',
									'Antigua y Barbuda'=>'Antigua y Barbuda',
									'Argentina'=>'Argentina',
									'Armenia'=>'Armenia',
									'Aruba'=>'Aruba',
									'Australia'=>'Australia',
									'Austria'=>'Austria',
									'Azerbaiyán'=>'Azerbaiyán',
									'Bahamas'=>'Bahamas',
									'Bahréin'=>'Bahréin',
									'Bangladesh'=>'Bangladesh',
									'Barbados'=>'Barbados',
									'Bielorusia'=>'Bielorusia',
									'Bélgica'=>'Bélgica',
									'Belice'=>'Belice',
									'Benin'=>'Benin',
									'Bermuda'=>'Bermuda',
									'Bután'=>'Bután',
									'Bolivia'=>'Bolivia',
									'Bosnia y Herzegovina'=>'Bosnia y Herzegovina',
									'Botswana'=>'Botswana',
									'Isla Bouvet'=>'Isla Bouvet',
									'Brasil'=>'Brasil',
									'Territorio Británico en el Océano Indico'=>'Territorio Británico en el Océano Indico',
									'Islas Vírgenes (Reino Unido)'=>'Islas Vírgenes (Reino Unido)',
									'Brunei'=>'Brunei',
									'Bulgaria'=>'Bulgaria',
									'Burkina Faso'=>'Burkina Faso',
									'Burundi'=>'Burundi',
									'Camboya'=>'Camboya',
									'Camerún'=>'Camerún',
									'Canadá'=>'Canadá',
									'Cabo Verde'=>'Cabo Verde',
									'Islas Caimán'=>'Islas Caimán',
									'República Centroafricana'=>'República Centroafricana',
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
									'República Checa'=>'República Checa',
									'República Democrática del Congo'=>'República Democrática del Congo',
									'Dinamarca'=>'Dinamarca',
									'Territorio en disputa'=>'Territorio en disputa',
									'Djibouti'=>'Djibouti',
									'Dominica'=>'Dominica',
									'República Dominicana'=>'República Dominicana',
									'Timor Occidental'=>'Timor Occidental',
									'Ecuador'=>'Ecuador',
									'Egipto'=>'Egipto',
									'El Salvador'=>'El Salvador',
									'Guinea Ecuatorial'=>'Guinea Ecuatorial',
									'Eritrea'=>'Eritrea',
									'Estonia'=>'Estonia',
									'Etiopía'=>'Etiopía',
									'Islas Malvinas'=>'Islas Malvinas',
									'Islas Faroe'=>'Islas Faroe',
									'Estados Federados de Micronesia'=>'Estados Federados de Micronesia',
									'Fiji'=>'Fiji',
									'Finlandia'=>'Finlandia',
									'Francia'=>'Francia',
									'Guayana Francesa'=>'Guayana Francesa',
									'Polinesia Francesa'=>'Polinesia Francesa',
									'Territorios Franceses del Sur'=>'Territorios Franceses del Sur',
									'Gabón'=>'Gabón',
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
									'Haití'=>'Haití',
									'Islas Heard y McDonald'=>'Islas Heard y McDonald',
									'Honduras'=>'Honduras',
									'Hong Kong'=>'Hong Kong',
									'Hungría'=>'Hungría',
									'Islandia'=>'Islandia',
									'India'=>'India',
									'Indonesia'=>'Indonesia',
									'Irán'=>'Irán',
									'Iraq'=>'Iraq',
									'Zona neutra Iraq-Arabia Saudí'=>'Zona neutra Iraq-Arabia Saudí',
									'Irlanda'=>'Irlanda',
									'Israel'=>'Israel',
									'Italia'=>'Italia',
									'Costa de Marfil'=>'Costa de Marfil',
									'Jamaica'=>'Jamaica',
									'Japón'=>'Japón',
									'Jordania'=>'Jordania',
									'Kazajstán'=>'Kazajstán',
									'Kenia'=>'Kenia',
									'Kiribati'=>'Kiribati',
									'Kuwait'=>'Kuwait',
									'Kirguistán'=>'Kirguistán',
									'Laos'=>'Laos',
									'Letonia'=>'Letonia',
									'Líbano'=>'Líbano',
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
									'México'=>'México',
									'Moldova'=>'Moldova',
									'Mónaco'=>'Mónaco',
									'Mongolia'=>'Mongolia',
									'Montserrat'=>'Montserrat',
									'Marruecos'=>'Marruecos',
									'Mozambique'=>'Mozambique',
									'Myanmar'=>'Myanmar',
									'Namibia'=>'Namibia',
									'Nauru'=>'Nauru',
									'Nepal'=>'Nepal',
									'Países Bajos'=>'Países Bajos',
									'Antillas Holandesas'=>'Antillas Holandesas',
									'Nueva Caledonia'=>'Nueva Caledonia',
									'Nueva Zelanda'=>'Nueva Zelanda',
									'Nicaragua'=>'Nicaragua',
									'Níger'=>'Níger',
									'Nigeria'=>'Nigeria',
									'Niue'=>'Niue',
									'Isla Norfolk'=>'Isla Norfolk',
									'Corea del Norte'=>'Corea del Norte',
									'Islas Mariana del Norte'=>'Islas Mariana del Norte',
									'Noruega'=>'Noruega',
									'Omán'=>'Omán',
									'Pakistán'=>'Pakistán',
									'Palau'=>'Palau',
									'Territorios Palestinos Ocupados'=>'Territorios Palestinos Ocupados',
									'Panamá'=>'Panamá',
									'Papúa-Nueva Guinea'=>'Papúa-Nueva Guinea',
									'Paraguay'=>'Paraguay',
									'Perú'=>'Perú',
									'Filipinas'=>'Filipinas',
									'Islas Pitcairn'=>'Islas Pitcairn',
									'Polonia'=>'Polonia',
									'Portugal'=>'Portugal',
									'Puerto Rico'=>'Puerto Rico',
									'Qatar'=>'Qatar',
									'Reunión'=>'Reunión',
									'Rumanía'=>'Rumanía',
									'Rusia'=>'Rusia',
									'Ruanda'=>'Ruanda',
									'Santa Elena y Dependencias'=>'Santa Elena y Dependencias',
									'Saint Kitts y Nevis'=>'Saint Kitts y Nevis',
									'Santa Lucía'=>'Santa Lucía',
									'San Pedro y Miquelón'=>'San Pedro y Miquelón',
									'San Vicente y Granadinas'=>'San Vicente y Granadinas',
									'Samoa'=>'Samoa',
									'San Marino'=>'San Marino',
									'Santo Tomé y Príncipe'=>'Santo Tomé y Príncipe',
									'Arabia Saudí'=>'Arabia Saudí',
									'Senegal'=>'Senegal',
									'Serbia y Montenegro'=>'Serbia y Montenegro',
									'Seychelles'=>'Seychelles',
									'Sierra Leona'=>'Sierra Leona',
									'Singapur'=>'Singapur',
									'Eslovaquia'=>'Eslovaquia',
									'Eslovenia'=>'Eslovenia',
									'Islas Salomón'=>'Islas Salomón',
									'Somalia'=>'Somalia',
									'Sudáfrica'=>'Sudáfrica',
									'Islas Georgia del Sur e Islas Sandwich del Sur'=>'Islas Georgia del Sur e Islas Sandwich del Sur',
									'Corea del Sur'=>'Corea del Sur',
									'España'=>'España',
									'Islas Spratly'=>'Islas Spratly',
									'Sri Lanka'=>'Sri Lanka',
									'Sudán'=>'Sudán',
									'Surinám'=>'Surinám',
									'Islas Svalbard y Jan Mayen'=>'Islas Svalbard y Jan Mayen',
									'Swazilandia'=>'Swazilandia',
									'Suecia'=>'Suecia',
									'Suiza'=>'Suiza',
									'Siria'=>'Siria',
									'Taiwán'=>'Taiwán',
									'Tayikistán'=>'Tayikistán',
									'Tanzania'=>'Tanzania',
									'Tailandia'=>'Tailandia',
									'Togo'=>'Togo',
									'Tokelau'=>'Tokelau',
									'Tonga'=>'Tonga',
									'Trinidad y Tobago'=>'Trinidad y Tobago',
									'Túnez'=>'Túnez',
									'Turquía'=>'Turquía',
									'Turkmenistán'=>'Turkmenistán',
									'Islas Turks y Caicos'=>'Islas Turks y Caicos',
									'Tuvalu'=>'Tuvalu',
									'Uganda'=>'Uganda',
									'Ucrania'=>'Ucrania',
									'Emiratos Árabes Unidos'=>'Emiratos Árabes Unidos',
									'Reino Unido'=>'Reino Unido',
									'Zona neutra de las Naciones Unidas'=>'Zona neutra de las Naciones Unidas',
									'Estados Unidos'=>'Estados Unidos',
									'Islas Menores de los Estados Unidos'=>'Islas Menores de los Estados Unidos',
									'Uruguay'=>'Uruguay',
									'Islas Vírgenes de los Estados Unidos'=>'Islas Vírgenes de los Estados Unidos',
									'Uzbekistán'=>'Uzbekistán',
									'Vanuatu'=>'Vanuatu',
									'Vaticano'=>'Vaticano',
									'Venezuela'=>'Venezuela',
									'Vietnám'=>'Vietnám',
									'Wallis y Futuna'=>'Wallis y Futuna',
									'Sáhara Occidental'=>'Sáhara Occidental',
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
			->setmultioptions(array('Afganistán'=>'Afganistán',
									'Islas Aland '=>'Islas Aland ',
									'Albania'=>'Albania',
									'Argelia'=>'Argelia',
									'Samoa Americana'=>'Samoa Americana',
									'Andorra'=>'Andorra',
									'Angola'=>'Angola',
									'Anguila'=>'Anguila',
									'Antártida'=>'Antártida',
									'Antigua y Barbuda'=>'Antigua y Barbuda',
									'Argentina'=>'Argentina',
									'Armenia'=>'Armenia',
									'Aruba'=>'Aruba',
									'Australia'=>'Australia',
									'Austria'=>'Austria',
									'Azerbaiyán'=>'Azerbaiyán',
									'Bahamas'=>'Bahamas',
									'Bahréin'=>'Bahréin',
									'Bangladesh'=>'Bangladesh',
									'Barbados'=>'Barbados',
									'Bielorusia'=>'Bielorusia',
									'Bélgica'=>'Bélgica',
									'Belice'=>'Belice',
									'Benin'=>'Benin',
									'Bermuda'=>'Bermuda',
									'Bután'=>'Bután',
									'Bolivia'=>'Bolivia',
									'Bosnia y Herzegovina'=>'Bosnia y Herzegovina',
									'Botswana'=>'Botswana',
									'Isla Bouvet'=>'Isla Bouvet',
									'Brasil'=>'Brasil',
									'Territorio Británico en el Océano Indico'=>'Territorio Británico en el Océano Indico',
									'Islas Vírgenes (Reino Unido)'=>'Islas Vírgenes (Reino Unido)',
									'Brunei'=>'Brunei',
									'Bulgaria'=>'Bulgaria',
									'Burkina Faso'=>'Burkina Faso',
									'Burundi'=>'Burundi',
									'Camboya'=>'Camboya',
									'Camerún'=>'Camerún',
									'Canadá'=>'Canadá',
									'Cabo Verde'=>'Cabo Verde',
									'Islas Caimán'=>'Islas Caimán',
									'República Centroafricana'=>'República Centroafricana',
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
									'República Checa'=>'República Checa',
									'República Democrática del Congo'=>'República Democrática del Congo',
									'Dinamarca'=>'Dinamarca',
									'Territorio en disputa'=>'Territorio en disputa',
									'Djibouti'=>'Djibouti',
									'Dominica'=>'Dominica',
									'República Dominicana'=>'República Dominicana',
									'Timor Occidental'=>'Timor Occidental',
									'Ecuador'=>'Ecuador',
									'Egipto'=>'Egipto',
									'El Salvador'=>'El Salvador',
									'Guinea Ecuatorial'=>'Guinea Ecuatorial',
									'Eritrea'=>'Eritrea',
									'Estonia'=>'Estonia',
									'Etiopía'=>'Etiopía',
									'Islas Malvinas'=>'Islas Malvinas',
									'Islas Faroe'=>'Islas Faroe',
									'Estados Federados de Micronesia'=>'Estados Federados de Micronesia',
									'Fiji'=>'Fiji',
									'Finlandia'=>'Finlandia',
									'Francia'=>'Francia',
									'Guayana Francesa'=>'Guayana Francesa',
									'Polinesia Francesa'=>'Polinesia Francesa',
									'Territorios Franceses del Sur'=>'Territorios Franceses del Sur',
									'Gabón'=>'Gabón',
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
									'Haití'=>'Haití',
									'Islas Heard y McDonald'=>'Islas Heard y McDonald',
									'Honduras'=>'Honduras',
									'Hong Kong'=>'Hong Kong',
									'Hungría'=>'Hungría',
									'Islandia'=>'Islandia',
									'India'=>'India',
									'Indonesia'=>'Indonesia',
									'Irán'=>'Irán',
									'Iraq'=>'Iraq',
									'Zona neutra Iraq-Arabia Saudí'=>'Zona neutra Iraq-Arabia Saudí',
									'Irlanda'=>'Irlanda',
									'Israel'=>'Israel',
									'Italia'=>'Italia',
									'Costa de Marfil'=>'Costa de Marfil',
									'Jamaica'=>'Jamaica',
									'Japón'=>'Japón',
									'Jordania'=>'Jordania',
									'Kazajstán'=>'Kazajstán',
									'Kenia'=>'Kenia',
									'Kiribati'=>'Kiribati',
									'Kuwait'=>'Kuwait',
									'Kirguistán'=>'Kirguistán',
									'Laos'=>'Laos',
									'Letonia'=>'Letonia',
									'Líbano'=>'Líbano',
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
									'México'=>'México',
									'Moldova'=>'Moldova',
									'Mónaco'=>'Mónaco',
									'Mongolia'=>'Mongolia',
									'Montserrat'=>'Montserrat',
									'Marruecos'=>'Marruecos',
									'Mozambique'=>'Mozambique',
									'Myanmar'=>'Myanmar',
									'Namibia'=>'Namibia',
									'Nauru'=>'Nauru',
									'Nepal'=>'Nepal',
									'Países Bajos'=>'Países Bajos',
									'Antillas Holandesas'=>'Antillas Holandesas',
									'Nueva Caledonia'=>'Nueva Caledonia',
									'Nueva Zelanda'=>'Nueva Zelanda',
									'Nicaragua'=>'Nicaragua',
									'Níger'=>'Níger',
									'Nigeria'=>'Nigeria',
									'Niue'=>'Niue',
									'Isla Norfolk'=>'Isla Norfolk',
									'Corea del Norte'=>'Corea del Norte',
									'Islas Mariana del Norte'=>'Islas Mariana del Norte',
									'Noruega'=>'Noruega',
									'Omán'=>'Omán',
									'Pakistán'=>'Pakistán',
									'Palau'=>'Palau',
									'Territorios Palestinos Ocupados'=>'Territorios Palestinos Ocupados',
									'Panamá'=>'Panamá',
									'Papúa-Nueva Guinea'=>'Papúa-Nueva Guinea',
									'Paraguay'=>'Paraguay',
									'Perú'=>'Perú',
									'Filipinas'=>'Filipinas',
									'Islas Pitcairn'=>'Islas Pitcairn',
									'Polonia'=>'Polonia',
									'Portugal'=>'Portugal',
									'Puerto Rico'=>'Puerto Rico',
									'Qatar'=>'Qatar',
									'Reunión'=>'Reunión',
									'Rumanía'=>'Rumanía',
									'Rusia'=>'Rusia',
									'Ruanda'=>'Ruanda',
									'Santa Elena y Dependencias'=>'Santa Elena y Dependencias',
									'Saint Kitts y Nevis'=>'Saint Kitts y Nevis',
									'Santa Lucía'=>'Santa Lucía',
									'San Pedro y Miquelón'=>'San Pedro y Miquelón',
									'San Vicente y Granadinas'=>'San Vicente y Granadinas',
									'Samoa'=>'Samoa',
									'San Marino'=>'San Marino',
									'Santo Tomé y Príncipe'=>'Santo Tomé y Príncipe',
									'Arabia Saudí'=>'Arabia Saudí',
									'Senegal'=>'Senegal',
									'Serbia y Montenegro'=>'Serbia y Montenegro',
									'Seychelles'=>'Seychelles',
									'Sierra Leona'=>'Sierra Leona',
									'Singapur'=>'Singapur',
									'Eslovaquia'=>'Eslovaquia',
									'Eslovenia'=>'Eslovenia',
									'Islas Salomón'=>'Islas Salomón',
									'Somalia'=>'Somalia',
									'Sudáfrica'=>'Sudáfrica',
									'Islas Georgia del Sur e Islas Sandwich del Sur'=>'Islas Georgia del Sur e Islas Sandwich del Sur',
									'Corea del Sur'=>'Corea del Sur',
									'España'=>'España',
									'Islas Spratly'=>'Islas Spratly',
									'Sri Lanka'=>'Sri Lanka',
									'Sudán'=>'Sudán',
									'Surinám'=>'Surinám',
									'Islas Svalbard y Jan Mayen'=>'Islas Svalbard y Jan Mayen',
									'Swazilandia'=>'Swazilandia',
									'Suecia'=>'Suecia',
									'Suiza'=>'Suiza',
									'Siria'=>'Siria',
									'Taiwán'=>'Taiwán',
									'Tayikistán'=>'Tayikistán',
									'Tanzania'=>'Tanzania',
									'Tailandia'=>'Tailandia',
									'Togo'=>'Togo',
									'Tokelau'=>'Tokelau',
									'Tonga'=>'Tonga',
									'Trinidad y Tobago'=>'Trinidad y Tobago',
									'Túnez'=>'Túnez',
									'Turquía'=>'Turquía',
									'Turkmenistán'=>'Turkmenistán',
									'Islas Turks y Caicos'=>'Islas Turks y Caicos',
									'Tuvalu'=>'Tuvalu',
									'Uganda'=>'Uganda',
									'Ucrania'=>'Ucrania',
									'Emiratos Árabes Unidos'=>'Emiratos Árabes Unidos',
									'Reino Unido'=>'Reino Unido',
									'Zona neutra de las Naciones Unidas'=>'Zona neutra de las Naciones Unidas',
									'Estados Unidos'=>'Estados Unidos',
									'Islas Menores de los Estados Unidos'=>'Islas Menores de los Estados Unidos',
									'Uruguay'=>'Uruguay',
									'Islas Vírgenes de los Estados Unidos'=>'Islas Vírgenes de los Estados Unidos',
									'Uzbekistán'=>'Uzbekistán',
									'Vanuatu'=>'Vanuatu',
									'Vaticano'=>'Vaticano',
									'Venezuela'=>'Venezuela',
									'Vietnám'=>'Vietnám',
									'Wallis y Futuna'=>'Wallis y Futuna',
									'Sáhara Occidental'=>'Sáhara Occidental',
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