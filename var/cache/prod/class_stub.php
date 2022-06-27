<?php

class SpecificPrice extends SpecificPriceCore {};
class Gender extends GenderCore {};
class PaymentOptionsFinder extends PaymentOptionsFinderCore {};
class ConditionsToApproveFinder extends ConditionsToApproveFinderCore {};
class DeliveryOptionsFinder extends DeliveryOptionsFinderCore {};
class CheckoutAddressesStep extends CheckoutAddressesStepCore {};
abstract class AbstractCheckoutStep extends AbstractCheckoutStepCore {};
class CheckoutPersonalInformationStep extends CheckoutPersonalInformationStepCore {};
class CheckoutProcess extends CheckoutProcessCore {};
class CheckoutDeliveryStep extends CheckoutDeliveryStepCore {};
class CheckoutSession extends CheckoutSessionCore {};
class AddressValidator extends AddressValidatorCore {};
class CheckoutPaymentStep extends CheckoutPaymentStepCore {};
class CartChecksum extends CartChecksumCore {};
class Attribute extends AttributeCore {};
class OrderState extends OrderStateCore {};
class OrderDetail extends OrderDetailCore {};
class OrderMessage extends OrderMessageCore {};
class Order extends OrderCore {};
class OrderPayment extends OrderPaymentCore {};
class OrderSlip extends OrderSlipCore {};
class OrderCarrier extends OrderCarrierCore {};
class OrderCartRule extends OrderCartRuleCore {};
class OrderDiscount extends OrderDiscountCore {};
class OrderHistory extends OrderHistoryCore {};
class OrderReturn extends OrderReturnCore {};
class OrderInvoice extends OrderInvoiceCore {};
class OrderReturnState extends OrderReturnStateCore {};
class DbPDO extends DbPDOCore {};
abstract class Db extends DbCore {};
class DbQuery extends DbQueryCore {};
class DbMySQLi extends DbMySQLiCore {};
class LinkProxy extends LinkProxyCore {};
class CustomerSession extends CustomerSessionCore {};
class Tools extends ToolsCore {};
class Contact extends ContactCore {};
class Page extends PageCore {};
class Manufacturer extends ManufacturerCore {};
class Combination extends CombinationCore {};
class Store extends StoreCore {};
class Customization extends CustomizationCore {};
class SupplierAddress extends SupplierAddressCore {};
abstract class ObjectModel extends ObjectModelCore {};
class TaxConfiguration extends TaxConfigurationCore {};
class Tax extends TaxCore {};
class TaxCalculator extends TaxCalculatorCore {};
class TaxManagerFactory extends TaxManagerFactoryCore {};
abstract class TaxManagerModule extends TaxManagerModuleCore {};
class TaxRulesGroup extends TaxRulesGroupCore {};
class TaxRulesTaxManager extends TaxRulesTaxManagerCore {};
class TaxRule extends TaxRuleCore {};
class CartRule extends CartRuleCore {};
class AddressChecksum extends AddressChecksumCore {};
class QqUploadedFileXhr extends QqUploadedFileXhrCore {};
class EmployeeSession extends EmployeeSessionCore {};
class PrestaShopLogger extends PrestaShopLoggerCore {};
abstract class AbstractLogger extends AbstractLoggerCore {};
class FileLogger extends FileLoggerCore {};
class Dispatcher extends DispatcherCore {};
class Group extends GroupCore {};
class GroupLang extends GroupLangCore {};
class FeatureValueLang extends FeatureValueLangCore {};
class CarrierLang extends CarrierLangCore {};
class OrderMessageLang extends OrderMessageLangCore {};
class OrderStateLang extends OrderStateLangCore {};
class MetaLang extends MetaLangCore {};
class QuickAccessLang extends QuickAccessLangCore {};
class ConfigurationLang extends ConfigurationLangCore {};
class CmsCategoryLang extends CmsCategoryLangCore {};
class RiskLang extends RiskLangCore {};
class AttributeLang extends AttributeLangCore {};
class FeatureLang extends FeatureLangCore {};
class StockMvtReasonLang extends StockMvtReasonLangCore {};
class ProfileLang extends ProfileLangCore {};
class AttributeGroupLang extends AttributeGroupLangCore {};
class CategoryLang extends CategoryLangCore {};
class ThemeLang extends ThemeLangCore {};
class GenderLang extends GenderLangCore {};
class OrderReturnStateLang extends OrderReturnStateLangCore {};
class DataLang extends DataLangCore {};
class ContactLang extends ContactLangCore {};
class TabLang extends TabLangCore {};
class SupplyOrderStateLang extends SupplyOrderStateLangCore {};
class TreeToolbarSearch extends TreeToolbarSearchCore {};
abstract class TreeToolbarButton extends TreeToolbarButtonCore {};
class TreeToolbarLink extends TreeToolbarLinkCore {};
class Tree extends TreeCore {};
class TreeToolbar extends TreeToolbarCore {};
class TreeToolbarSearchCategories extends TreeToolbarSearchCategoriesCore {};
class HTMLTemplateInvoice extends HTMLTemplateInvoiceCore {};
class HTMLTemplateOrderReturn extends HTMLTemplateOrderReturnCore {};
class PDF extends PDFCore {};
abstract class HTMLTemplate extends HTMLTemplateCore {};
class HTMLTemplateSupplyOrderForm extends HTMLTemplateSupplyOrderFormCore {};
class PDFGenerator extends PDFGeneratorCore {};
class HTMLTemplateOrderSlip extends HTMLTemplateOrderSlipCore {};
class HTMLTemplateDeliverySlip extends HTMLTemplateDeliverySlipCore {};
class ProductDownload extends ProductDownloadCore {};
class Validate extends ValidateCore {};
class Cookie extends CookieCore {};
class Currency extends CurrencyCore {};
class ProductPresenterFactory extends ProductPresenterFactoryCore {};
class SpecificPriceFormatter extends SpecificPriceFormatterCore {};
class Connection extends ConnectionCore {};
class CSV extends CSVCore {};
class CMSRole extends CMSRoleCore {};
class HelperTreeShops extends HelperTreeShopsCore {};
class HelperView extends HelperViewCore {};
class HelperShop extends HelperShopCore {};
class HelperKpiRow extends HelperKpiRowCore {};
class HelperForm extends HelperFormCore {};
class Helper extends HelperCore {};
class HelperOptions extends HelperOptionsCore {};
class HelperList extends HelperListCore {};
class HelperUploader extends HelperUploaderCore {};
class HelperKpi extends HelperKpiCore {};
class HelperImageUploader extends HelperImageUploaderCore {};
class HelperTreeCategories extends HelperTreeCategoriesCore {};
class HelperCalendar extends HelperCalendarCore {};
class Referrer extends ReferrerCore {};
class Guest extends GuestCore {};
class ImageType extends ImageTypeCore {};
class ImageManager extends ImageManagerCore {};
class Feature extends FeatureCore {};
class Curve extends CurveCore {};
class Mail extends MailCore {};
class ProductSupplier extends ProductSupplierCore {};
class QqUploadedFileForm extends QqUploadedFileFormCore {};
class DateRange extends DateRangeCore {};
class CacheXcache extends CacheXcacheCore {};
class CacheMemcached extends CacheMemcachedCore {};
abstract class Cache extends CacheCore {};
class CacheApc extends CacheApcCore {};
class CacheMemcache extends CacheMemcacheCore {};
class Zone extends ZoneCore {};
class WarehouseAddress extends WarehouseAddressCore {};
class Category extends CategoryCore {};
class Cart extends CartCore {};
class CustomerThread extends CustomerThreadCore {};
class SmartyResourceParent extends SmartyResourceParentCore {};
class SmartyCustom extends SmartyCustomCore {};
class TemplateFinder extends TemplateFinderCore {};
class SmartyCustomTemplate extends SmartyCustomTemplateCore {};
class SmartyDevTemplate extends SmartyDevTemplateCore {};
class SmartyResourceModule extends SmartyResourceModuleCore {};
class ProductSale extends ProductSaleCore {};
class ConfigurationTest extends ConfigurationTestCore {};
class Risk extends RiskCore {};
class CustomerAddress extends CustomerAddressCore {};
class SearchEngine extends SearchEngineCore {};
class Upgrader extends UpgraderCore {};
class SpecificPriceRule extends SpecificPriceRuleCore {};
class Context extends ContextCore {};
class Customer extends CustomerCore {};
class Address extends AddressCore {};
class Language extends LanguageCore {};
class ConfigurationKPI extends ConfigurationKPICore {};
class CustomizationField extends CustomizationFieldCore {};
abstract class PaymentModule extends PaymentModuleCore {};
class ShopGroup extends ShopGroupCore {};
class Shop extends ShopCore {};
class ShopUrl extends ShopUrlCore {};
class State extends StateCore {};
class Alias extends AliasCore {};
class StockManagerFactory extends StockManagerFactoryCore {};
class SupplyOrderReceiptHistory extends SupplyOrderReceiptHistoryCore {};
class Stock extends StockCore {};
class StockAvailable extends StockAvailableCore {};
abstract class StockManagerModule extends StockManagerModuleCore {};
class SupplyOrderDetail extends SupplyOrderDetailCore {};
class StockMvt extends StockMvtCore {};
class SupplyOrder extends SupplyOrderCore {};
class Warehouse extends WarehouseCore {};
class StockManager extends StockManagerCore {};
class WarehouseProductLocation extends WarehouseProductLocationCore {};
class StockMvtReason extends StockMvtReasonCore {};
class SupplyOrderHistory extends SupplyOrderHistoryCore {};
class StockMvtWS extends StockMvtWSCore {};
class SupplyOrderState extends SupplyOrderStateCore {};
class FeatureValue extends FeatureValueCore {};
class Hook extends HookCore {};
class LocalizationPack extends LocalizationPackCore {};
class TranslatedConfiguration extends TranslatedConfigurationCore {};
class CccReducer extends CccReducerCore {};
class CssMinifier extends CssMinifierCore {};
class JavascriptManager extends JavascriptManagerCore {};
class StylesheetManager extends StylesheetManagerCore {};
class JsMinifier extends JsMinifierCore {};
abstract class AbstractAssetManager extends AbstractAssetManagerCore {};
class CustomerFormatter extends CustomerFormatterCore {};
abstract class AbstractForm extends AbstractFormCore {};
class CustomerPersister extends CustomerPersisterCore {};
class FormField extends FormFieldCore {};
class CustomerLoginFormatter extends CustomerLoginFormatterCore {};
class CustomerForm extends CustomerFormCore {};
class CustomerAddressFormatter extends CustomerAddressFormatterCore {};
class CustomerAddressPersister extends CustomerAddressPersisterCore {};
class CustomerAddressForm extends CustomerAddressFormCore {};
class CustomerLoginForm extends CustomerLoginFormCore {};
class Translate extends TranslateCore {};
class Supplier extends SupplierCore {};
class Pack extends PackCore {};
class PhpEncryptionEngine extends PhpEncryptionEngineCore {};
class GroupReduction extends GroupReductionCore {};
class AddressFormat extends AddressFormatCore {};
abstract class Controller extends ControllerCore {};
class ModuleFrontController extends ModuleFrontControllerCore {};
abstract class ProductPresentingFrontController extends ProductPresentingFrontControllerCore {};
class AdminController extends AdminControllerCore {};
class FrontController extends FrontControllerCore {};
abstract class ProductListingFrontController extends ProductListingFrontControllerCore {};
abstract class ModuleAdminController extends ModuleAdminControllerCore {};
class CMS extends CMSCore {};
class CustomerMessage extends CustomerMessageCore {};
class Country extends CountryCore {};
class Message extends MessageCore {};
class Attachment extends AttachmentCore {};
class ValidateConstraintTranslator extends ValidateConstraintTranslatorCore {};
class ManufacturerAddress extends ManufacturerAddressCore {};
class FileUploader extends FileUploaderCore {};
class Delivery extends DeliveryCore {};
class Employee extends EmployeeCore {};
class PhpEncryption extends PhpEncryptionCore {};
class Uploader extends UploaderCore {};
class PrestaShopException extends PrestaShopExceptionCore {};
class PrestaShopPaymentException extends PrestaShopPaymentExceptionCore {};
class PrestaShopObjectNotFoundException extends PrestaShopObjectNotFoundExceptionCore {};
class PrestaShopDatabaseException extends PrestaShopDatabaseExceptionCore {};
class PrestaShopModuleException extends PrestaShopModuleExceptionCore {};
class ConnectionsSource extends ConnectionsSourceCore {};
class Access extends AccessCore {};
class CMSCategory extends CMSCategoryCore {};
class Link extends LinkCore {};
class Configuration extends ConfigurationCore {};
class RangeWeight extends RangeWeightCore {};
class RangePrice extends RangePriceCore {};
class Profile extends ProfileCore {};
class AttributeGroup extends AttributeGroupCore {};
class Tag extends TagCore {};
class Meta extends MetaCore {};
class ProductAssembler extends ProductAssemblerCore {};
class Windows extends WindowsCore {};
class RequestSql extends RequestSqlCore {};
class PrestaShopBackup extends PrestaShopBackupCore {};
class Chart extends ChartCore {};
class Image extends ImageCore {};
class Tab extends TabCore {};
class Notification extends NotificationCore {};
class Carrier extends CarrierCore {};
class QuickAccess extends QuickAccessCore {};
class Media extends MediaCore {};
class PhpEncryptionLegacyEngine extends PhpEncryptionLegacyEngineCore {};
class Product extends ProductCore {};
class Search extends SearchCore {};
abstract class ModuleGridEngine extends ModuleGridEngineCore {};
abstract class ModuleGraphEngine extends ModuleGraphEngineCore {};
abstract class CarrierModule extends CarrierModuleCore {};
abstract class ModuleGrid extends ModuleGridCore {};
abstract class ModuleGraph extends ModuleGraphCore {};
abstract class Module extends ModuleCore {};
class WebserviceOutputXML extends WebserviceOutputXMLCore {};
class WebserviceSpecificManagementImages extends WebserviceSpecificManagementImagesCore {};
class WebserviceSpecificManagementAttachments extends WebserviceSpecificManagementAttachmentsCore {};
class WebserviceKey extends WebserviceKeyCore {};
class WebserviceOutputBuilder extends WebserviceOutputBuilderCore {};
class WebserviceException extends WebserviceExceptionCore {};
class WebserviceSpecificManagementSearch extends WebserviceSpecificManagementSearchCore {};
class WebserviceRequest extends WebserviceRequestCore {};
class WebserviceOutputJSON extends WebserviceOutputJSONCore {};
class PrestaShopCollection extends PrestaShopCollectionCore {};
