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
 * Generated from xml/schema/CRM/Contribute/ContributionRecur.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Contribute_DAO_ContributionRecur extends CRM_Core_DAO {
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_contribution_recur';
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
  static $_log = true;
  /**
   * Contribution Recur ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Foreign key to civicrm_contact.id .
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * Amount to be contributed or charged each recurrence.
   *
   * @var float
   */
  public $amount;
  /**
   * 3 character string, value from config setting or input via user.
   *
   * @var string
   */
  public $currency;
  /**
   * Time units for recurrence of payment.
   *
   * @var string
   */
  public $frequency_unit;
  /**
   * Number of time units for recurrence of payment.
   *
   * @var int unsigned
   */
  public $frequency_interval;
  /**
   * Total number of payments to be made. Set this to 0 if this is an open-ended commitment i.e. no set end date.
   *
   * @var int unsigned
   */
  public $installments;
  /**
   * The date the first scheduled recurring contribution occurs.
   *
   * @var datetime
   */
  public $start_date;
  /**
   * When this recurring contribution record was created.
   *
   * @var datetime
   */
  public $create_date;
  /**
   * Last updated date for this record. mostly the last time a payment was received
   *
   * @var datetime
   */
  public $modified_date;
  /**
   * Date this recurring contribution was cancelled by contributor- if we can get access to it
   *
   * @var datetime
   */
  public $cancel_date;
  /**
   * Date this recurring contribution finished successfully
   *
   * @var datetime
   */
  public $end_date;
  /**
   * Possibly needed to store a unique identifier for this recurring payment order - if this is available from the processor??
   *
   * @var string
   */
  public $processor_id;
  /**
   * Optionally used to store a link to a payment token used for this recurring contribution.
   *
   * @var int unsigned
   */
  public $payment_token_id;
  /**
   * unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method
   *
   * @var string
   */
  public $trxn_id;
  /**
   * unique invoice id, system generated or passed in
   *
   * @var string
   */
  public $invoice_id;
  /**
   *
   * @var int unsigned
   */
  public $contribution_status_id;
  /**
   *
   * @var boolean
   */
  public $is_test;
  /**
   * Day in the period when the payment should be charged e.g. 1st of month, 15th etc.
   *
   * @var int unsigned
   */
  public $cycle_day;
  /**
   * Next scheduled date
   *
   * @var datetime
   */
  public $next_sched_contribution_date;
  /**
   * Number of failed charge attempts since last success. Business rule could be set to deactivate on more than x failures.
   *
   * @var int unsigned
   */
  public $failure_count;
  /**
   * Date to retry failed attempt
   *
   * @var datetime
   */
  public $failure_retry_date;
  /**
   * Some systems allow contributor to set a number of installments - but then auto-renew the subscription or commitment if they do not cancel.
   *
   * @var boolean
   */
  public $auto_renew;
  /**
   * Foreign key to civicrm_payment_processor.id
   *
   * @var int unsigned
   */
  public $payment_processor_id;
  /**
   * FK to Financial Type
   *
   * @var int unsigned
   */
  public $financial_type_id;
  /**
   * FK to Payment Instrument
   *
   * @var int unsigned
   */
  public $payment_instrument_id;
  /**
   * The campaign for which this contribution has been triggered.
   *
   * @var int unsigned
   */
  public $campaign_id;
  /**
   * if true, receipt is automatically emailed to contact on each successful payment
   *
   * @var boolean
   */
  public $is_email_receipt;
  /**
   * class constructor
   *
   * @return civicrm_contribution_recur
   */
  function __construct() {
    $this->__table = 'civicrm_contribution_recur';
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
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'payment_token_id', 'civicrm_payment_token', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'payment_processor_id', 'civicrm_payment_processor', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'financial_type_id', 'civicrm_financial_type', 'id');
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'campaign_id', 'civicrm_campaign', 'id');
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
          'title' => ts('Recurring Contribution ID') ,
          'description' => 'Contribution Recur ID',
          'required' => true,
        ) ,
        'contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contact ID') ,
          'description' => 'Foreign key to civicrm_contact.id .',
          'required' => true,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'amount' => array(
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Amount') ,
          'description' => 'Amount to be contributed or charged each recurrence.',
          'required' => true,
          'precision' => array(
            20,
            2
          ) ,
        ) ,
        'currency' => array(
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Currency') ,
          'description' => '3 character string, value from config setting or input via user.',
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
          'default' => 'NULL',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'table' => 'civicrm_currency',
            'keyColumn' => 'name',
            'labelColumn' => 'full_name',
            'nameColumn' => 'numeric_code',
          )
        ) ,
        'frequency_unit' => array(
          'name' => 'frequency_unit',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Frequency Unit') ,
          'description' => 'Time units for recurrence of payment.',
          'maxlength' => 8,
          'size' => CRM_Utils_Type::EIGHT,
          'default' => 'month',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'recur_frequency_units',
            'keyColumn' => 'name',
            'optionEditPath' => 'civicrm/admin/options/recur_frequency_units',
          )
        ) ,
        'frequency_interval' => array(
          'name' => 'frequency_interval',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Interval (number of units)') ,
          'description' => 'Number of time units for recurrence of payment.',
          'required' => true,
        ) ,
        'installments' => array(
          'name' => 'installments',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Number of Installments') ,
          'description' => 'Total number of payments to be made. Set this to 0 if this is an open-ended commitment i.e. no set end date.',
        ) ,
        'start_date' => array(
          'name' => 'start_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution Started Date') ,
          'description' => 'The date the first scheduled recurring contribution occurs.',
          'required' => true,
        ) ,
        'create_date' => array(
          'name' => 'create_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution Created Date') ,
          'description' => 'When this recurring contribution record was created.',
          'required' => true,
        ) ,
        'modified_date' => array(
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution Modified Date') ,
          'description' => 'Last updated date for this record. mostly the last time a payment was received',
        ) ,
        'cancel_date' => array(
          'name' => 'cancel_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution Cancel Date') ,
          'description' => 'Date this recurring contribution was cancelled by contributor- if we can get access to it',
        ) ,
        'end_date' => array(
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Recurring Contribution End Date') ,
          'description' => 'Date this recurring contribution finished successfully',
        ) ,
        'processor_id' => array(
          'name' => 'processor_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Processor ID') ,
          'description' => 'Possibly needed to store a unique identifier for this recurring payment order - if this is available from the processor??',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'payment_token_id' => array(
          'name' => 'payment_token_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Token ID') ,
          'description' => 'Optionally used to store a link to a payment token used for this recurring contribution.',
          'FKClassName' => 'CRM_Financial_DAO_PaymentToken',
        ) ,
        'trxn_id' => array(
          'name' => 'trxn_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Transaction ID') ,
          'description' => 'unique transaction id. may be processor id, bank id + trans id, or account number + check number... depending on payment_method',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'invoice_id' => array(
          'name' => 'invoice_id',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Invoice ID') ,
          'description' => 'unique invoice id, system generated or passed in',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'contribution_status_id' => array(
          'name' => 'contribution_status_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Recurring Contribution Status') ,
          'import' => true,
          'where' => 'civicrm_contribution_recur.contribution_status_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'default' => '1',
          'pseudoconstant' => array(
            'optionGroupName' => 'contribution_status',
            'optionEditPath' => 'civicrm/admin/options/contribution_status',
          )
        ) ,
        'is_test' => array(
          'name' => 'is_test',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Test') ,
          'import' => true,
          'where' => 'civicrm_contribution_recur.is_test',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
        ) ,
        'cycle_day' => array(
          'name' => 'cycle_day',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Number of Cycle Day') ,
          'description' => 'Day in the period when the payment should be charged e.g. 1st of month, 15th etc.',
          'required' => true,
          'default' => '1',
        ) ,
        'next_sched_contribution_date' => array(
          'name' => 'next_sched_contribution_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Next Scheduled Contribution Date') ,
          'description' => 'Next scheduled date',
        ) ,
        'failure_count' => array(
          'name' => 'failure_count',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Number of Failures') ,
          'description' => 'Number of failed charge attempts since last success. Business rule could be set to deactivate on more than x failures.',
        ) ,
        'failure_retry_date' => array(
          'name' => 'failure_retry_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Retry Failed Attempt Date') ,
          'description' => 'Date to retry failed attempt',
        ) ,
        'auto_renew' => array(
          'name' => 'auto_renew',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Auto Renew') ,
          'description' => 'Some systems allow contributor to set a number of installments - but then auto-renew the subscription or commitment if they do not cancel.',
          'required' => true,
        ) ,
        'payment_processor_id' => array(
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Processor') ,
          'description' => 'Foreign key to civicrm_payment_processor.id',
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
        ) ,
        'financial_type_id' => array(
          'name' => 'financial_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Type') ,
          'description' => 'FK to Financial Type',
          'export' => false,
          'where' => 'civicrm_contribution_recur.financial_type_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'FKClassName' => 'CRM_Financial_DAO_FinancialType',
          'pseudoconstant' => array(
            'table' => 'civicrm_financial_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'payment_instrument_id' => array(
          'name' => 'payment_instrument_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Payment Instrument') ,
          'description' => 'FK to Payment Instrument',
          'html' => array(
            'type' => 'Select',
          ) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'payment_instrument',
            'optionEditPath' => 'civicrm/admin/options/payment_instrument',
          )
        ) ,
        'contribution_campaign_id' => array(
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Campaign') ,
          'description' => 'The campaign for which this contribution has been triggered.',
          'import' => true,
          'where' => 'civicrm_contribution_recur.campaign_id',
          'headerPattern' => '',
          'dataPattern' => '',
          'export' => true,
          'FKClassName' => 'CRM_Campaign_DAO_Campaign',
          'pseudoconstant' => array(
            'table' => 'civicrm_campaign',
            'keyColumn' => 'id',
            'labelColumn' => 'title',
          )
        ) ,
        'is_email_receipt' => array(
          'name' => 'is_email_receipt',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Send email Receipt?') ,
          'description' => 'if true, receipt is automatically emailed to contact on each successful payment',
          'default' => '1',
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
        'contact_id' => 'contact_id',
        'amount' => 'amount',
        'currency' => 'currency',
        'frequency_unit' => 'frequency_unit',
        'frequency_interval' => 'frequency_interval',
        'installments' => 'installments',
        'start_date' => 'start_date',
        'create_date' => 'create_date',
        'modified_date' => 'modified_date',
        'cancel_date' => 'cancel_date',
        'end_date' => 'end_date',
        'processor_id' => 'processor_id',
        'payment_token_id' => 'payment_token_id',
        'trxn_id' => 'trxn_id',
        'invoice_id' => 'invoice_id',
        'contribution_status_id' => 'contribution_status_id',
        'is_test' => 'is_test',
        'cycle_day' => 'cycle_day',
        'next_sched_contribution_date' => 'next_sched_contribution_date',
        'failure_count' => 'failure_count',
        'failure_retry_date' => 'failure_retry_date',
        'auto_renew' => 'auto_renew',
        'payment_processor_id' => 'payment_processor_id',
        'financial_type_id' => 'financial_type_id',
        'payment_instrument_id' => 'payment_instrument_id',
        'campaign_id' => 'contribution_campaign_id',
        'is_email_receipt' => 'is_email_receipt',
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
            self::$_import['contribution_recur'] = & $fields[$name];
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
            self::$_export['contribution_recur'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
