<?php

use yii\db\Migration;

/**
 * Class m200102_191421_country_gii_table
 */
class m200102_191421_country_gii_table extends Migration
{

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql')
    {
      // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%country}}', [
      'code' => $this->string(2)->notNull(),
      'name' => $this->string(52)->notNull(),
      'population' => $this->integer()->notNull()->defaultValue(0),
      ], $tableOptions);

    // creates PRIMARY index
    $this->addPrimaryKey(
      'IDX_Code',
      'country',
      'code'
    );

    // Populate the table
    $this->batchInsert('{{%country}}', ['code', 'name', 'population'], [
      // Insert the countries
      ['AT', 'Austria', '8205000',],
      ['AU', 'Australia', '24016400',],
      ['BA', 'Bosnia and Herzegovina', '4590000',],
      ['BE', 'Belgium', '	10403000',],
      ['BG', 'Bulgaria', '	7148785',],
      ['BR', 'Brazil', '205722000',],
      ['CA', 'Canada', '35985751',],
      ['CN', 'China', '1330044000',],
      ['CZ', 'Czech Republic', '10476000',],
      ['DE', 'Germany', '81459000',],
      ['DK', 'Denmark', '5484000',],
      ['ES', 'Spain', '46505963',],
      ['FI', 'Finland', '5244000',],
      ['FR', 'France', '64513242',],
      ['GB', 'United Kingdom', '65097000',],
      ['GR', 'Greece', '11000000',],
      ['HR', 'Croatia', '4491000',],
      ['HU', 'Nungary', '9982000',],
      ['ID', 'Indonesia', '242968342'],
      ['IN', 'India', '1285400000',],
      ['IE', 'Ireland', '4622917',],
      ['IT', 'Italy', '60340328',],
      ['NL', 'Netherlands', '16645000',],
      ['PL', 'Poland', '38500000',],
      ['PT', 'Portugal', '10676000',],
      ['RO', 'Romania', '21959278',],
      ['RS', 'Serbia', '7344847',],
      ['RU', 'Russia', '146519759',],
      ['SE', 'Sweden', '9555893',],
      ['SK', 'Slovakia', '5455000',],
      ['US', 'United States', '322976000',],
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    // drops the `{{%country}}` table
    $this->dropTable('{{%country}}');
  }

}
