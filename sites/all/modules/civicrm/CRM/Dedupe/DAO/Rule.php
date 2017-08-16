<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.6                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2015                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2015
 *
 * Generated from xml/schema/CRM/Dedupe/Rule.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Dedupe_DAO_Rule extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_dedupe_rule';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = false;
  /**
   * Unique dedupe rule id
   *
   * @var int unsigned
   */
  public $id;
  /**
   * The id of the rule group this rule belongs to
   *
   * @var int unsigned
   */
  public $dedupe_rule_group_id;
  /**
   * The name of the table this rule is about
   *
   * @var string
   */
  public $rule_table;
  /**
   * The name of the field of the table referenced in rule_table
   *
   * @var string
   */
  public $rule_field;
  /**
   * The lenght of the matching substring
   *
   * @var int unsigned
   */
  public $rule_length;
  /**
   * The weight of the rule
   *
   * @var int
   */
  public $rule_weight;
  /**
   * class constructor
   *
   * @return civicrm_dedupe_rule
   */
  function __construct() {
    $this->__table = 'civicrm_dedupe_rule';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'dedupe_rule_group_id', 'civicrm_dedupe_rule_group', 'id');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'Unique dedupe rule id',
          'required' => true,
        ) ,
        'dedupe_rule_group_id' => array(
          'name' => 'dedupe_rule_group_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'The id of the rule group this rule belongs to',
          'required' => true,
          'FKClassName' => 'CRM_Dedupe_DAO_RuleGroup',
        ) ,
        'rule_table' => array(
          'name' => 'rule_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Rule Table') ,
          'description' => 'The name of the table this rule is about',
          'required' => true,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'rule_field' => array(
          'name' => 'rule_field',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Rule Field') ,
          'description' => 'The name of the field of the table referenced in rule_table',
          'required' => true,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'rule_length' => array(
          'name' => 'rule_length',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Rule Length') ,
          'description' => 'The lenght of the matching substring',
        ) ,
        'rule_weight' => array(
          'name' => 'rule_weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Rule Weight') ,
          'description' => 'The weight of the rule',
          'required' => true,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys() {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'dedupe_rule_group_id' => 'dedupe_rule_group_id',
        'rule_table' => 'rule_table',
        'rule_field' => 'rule_field',
        'rule_length' => 'rule_length',
        'rule_weight' => 'rule_weight',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['dedupe_rule'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['dedupe_rule'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
