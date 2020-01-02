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
      ['AU', 'Australia', '24016400',],
      ['BR', 'Brazil', '205722000',],
      ['CA', 'Canada', '35985751',],
      ['CN', 'China', '1375210000',],
      ['DE', 'Germany', '81459000',],
      ['FR', 'France', '64513242',],
      ['GB', 'United Kingdom', '65097000',],
      ['IN', 'India', '1285400000',],
      ['RU', 'Russia', '146519759',],
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
