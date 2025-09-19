CREATE TABLE \`(.+)\` \(

\$table = \$this->table('$1')->setComment('表');
\$table


`(.+)` tinyint.+DEFAULT '(.+)',
->addColumn(Column::tinyInteger('$1')->setDefault($2)->setComment(''))

`(.+)` tinyint.+,
->addColumn(Column::tinyInteger('$1')->setDefault(0)->setComment(''))



`(.+)` int.+unsigned.+DEFAULT '(.+)',
->addColumn(Column::integer('$1')->setUnsigned()->setDefault($2)->setComment(''))

`(.+)` int.+DEFAULT '(.+)',
->addColumn(Column::integer('$1')->setDefault($2)->setComment(''))

`(.+)` int.+ NOT NULL DEFAULT '(.+)',
->addColumn(Column::integer('$1')->setDefault($2)->setComment(''))

`(.+)` int.+ NULL,
->addColumn(Column::integer('$1')->setDefault(0)->setComment(''))



`(.+)` varchar.+DEFAULT '',
->addColumn(Column::string('$1')->setDefault('')->setComment(''))

`(.+)` varchar.+DEFAULT '(.+)',
->addColumn(Column::string('$1')->setDefault($2)->setComment(''))

`(.+)` varchar.+NULL,
->addColumn(Column::string('$1')->setDefault('')->setComment(''))



`(.+)` char.+DEFAULT '(.+)',
->addColumn(Column::string('$1')->setDefault($2)->setComment(''))

`(.+)` char.+DEFAULT '',
->addColumn(Column::string('$1')->setDefault('')->setComment(''))

`(.+)` char.+NULL,
->addColumn(Column::string('$1')->setDefault('')->setComment(''))


`(.+)` text?+,
->addColumn(Column::text('$1')->setComment(''))



`(.+)` decimal\((.+)\).+DEFAULT '(.+)',
->addColumn(Column::decimal('$1', $2)->setDefault($3)->setComment(''))

`(.+)` decimal\((.+)\).+NULL,
->addColumn(Column::decimal('$1', $2)->setDefault(0)->setComment(''))



`(.+)` datetime.+,
->addColumn(Column::dateTime('$1')->setComment(''))
  
`(.+)` date.+,
->addColumn(Column::date('$1')->setComment(''))



UNIQUE KEY `(.+)` \(`(.+)`\)?+
->addIndex(['$2'], ['name' => '$1', 'unique' => true])

KEY `(.+)` \(`(.+)`\)?+
->addIndex(['$2'], ['name' => '$1'])

`,` 
','



) ENGINE=InnoDB.+DEFAULT CHARSET=utf8mb4;
->save();



['id' => false, 'primary_key' => ['user_id', 'follower_id']]
['id' => 'user_id']

