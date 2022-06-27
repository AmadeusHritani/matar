{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="col-lg-12 col-md-12">
    <div class="izettle izettle-help">
        <div >
            <div class="panel">
                <div class="padding-2">
                    <h1>{l s='FAQ'  mod='izettleconnector'}</h1>
                    <dl>
                        <dt>
                            <a href="#accordion1" class="accordion-title accordionTitle js-accordionTrigger">
                                How can I connect my Zettle Account to PrestaShop?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion1">
                            <p>
                                To be able to start Syncing products from PrestaShop to Zettle, you will need to connect your PrestaShop store with your Zettle account.
                            </p>
                            <ul>
                                <li><strong>Step 1:</strong> Go to "Settings” and click on “GET API KEY”. You will get redirected to
                                    the
                                    Zettle website.
                                    If you do not have an Zettle Account yet, please create a free account by
                                    clicking
                                    “SIGN UP”
                                </li>

                                <li><strong>Step 2:</strong> Login with your Zettle account to start generating an Zettle API
                                    key.</li>
                                <li><strong>Step 3:</strong> Click on “Create key” to start the API key creation</li>

                                <li><strong>Step 4:</strong> Copy your Zettle API key by clicking “copy key”</li>

                                <li><strong>Step 5:</strong> Go back to the Zettle module in your PrestaShop and insert the Zettle API
                                    key into the field “API Key”
                                </li>

                                <li><strong>Step 6:</strong> Click the button “Save”. Your PrestaShop is now connected to Zettle.</li>
                            </ul>
                        </dd>

                        <dt>
                            <a href="#accordion2" class="accordion-title accordionTitle js-accordionTrigger">
                                How can I sync products with Zettle?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion2">

                            <ul>
                                <li><strong>Step 1:</strong> Navigate to the section “Sync”.
                                </li>

                                <li><strong>Step 2:</strong> Choose whether you want to synchronize all or just a selection of products.</li>
                                <li><strong>Step 3:</strong> Select if you want to replace all existing products on Zettle or add the products to Zettle.</li>

                                <li><strong>Step 4:</strong> Select if you want to synchronize your products with or without prices.</li>

                                <li><strong>Step 5:</strong> Select the language for the products you are exporting to Zettle. The language includes product name and product description. All available product translations you have created for your products, will be shown in the selection on this page. In the screenshot below, you see the available product translations English and German.
                                </li>

                                <li><strong>Step 6:</strong> Review your Sync configuration. If you are happy with the configuration, press “Start Sync”. </li>
                                <li><strong>Sync Details:</strong> While the Sync runs, you will see progress of the current task. During the sync, you can pause and continue the sync by clicking “Cancel”. </li>
                                <li><strong>Sync completed :</strong> As soon as the synchronization has been completed, your sync will be listed in the history of the module. </li>
                            </ul>
                        </dd>

                        <dt>
                            <a href="#accordion3" class="accordion-title accordionTitle js-accordionTrigger">
                                How do Product variants work?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion3">
                            <p>
                                Product variants are synced with Zettle as well. The attributes from the PrestaShop variants will automatically be created in Zettle.
                            </p>

                            <p>
                                Zettle supports up to 3 different attributes e.g. Size, Color, Print.

                            </p>

                            <p>
                                If product variants do contain more than 3 attributes, Zettle creates a single variant, that includes all product attributes.
                            </p>

                        </dd>

                        <dt>
                            <a href="#accordion4" class="accordion-title accordionTitle js-accordionTrigger">
                                Where can I see all synchronization events
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion4">
                            <p>
                                In the navigation point “History”, all performed product Syncs are listed.
                            </p>

                        </dd>

                        <dt>
                            <a href="#accordion5" class="accordion-title accordionTitle js-accordionTrigger">
                                How can I link a single product with Zettle
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion5">
                            <p>
                                Navigate to the product in your product catalogue and navigate to the section “Modules” and perform the following steps.
                            </p>
                            <ul>
                                <li><strong>Step 1:</strong> Click on the “Configure” button provided by the Zettle module.
                                </li>

                                <li><strong>Step 2:</strong> Activate the option “Sync product to Zettle”</li>
                                <li><strong>Step 3:</strong> Select if you want to sync price and/or quantity.</li>

                                <li><strong>Step 4:</strong> Select the language used for the Sync. </li>

                                <li><strong>Step 5:</strong> 	Click “Save Zettle settings for Product” to confirm the operation.
                                </li>

                                <li><strong>Step 6:</strong> The settings are saved and the product will be synced to Zettle.</li>
                            </ul>

                        </dd>

                        <dt>
                            <a href="#accordion6" class="accordion-title accordionTitle js-accordionTrigger">
                                Can I use a cron job to sync the products?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion6">
                            <p>
                                A cron job is usefull, if you are handling large numbers of products and transactions or if you see performance issues when using the automatic synchronization (default mode).
                            </p>

                            <p>
                                Go to “Settings” -> “Advanced Settings” and change the “sync mode” to “cron job”. Use the provided URL to configure your cron job.
                            </p>

                            <p>
                                Please find the cron job manager documentation of the preferred PrestaShop Hosting (IONOS) partner below. IONOS cron job manager documentation: https://www.ionos.com/help/hosting/cron-jobs/cron-job-manager/
                            </p>

                            <p>
                                If you are using another hosting provider, please reach out to your hosting partner support to receive more details on how to setup a cron job for your environment.
                            </p>

                        </dd>

                        <dt>
                            <a href="#accordion7" class="accordion-title accordionTitle js-accordionTrigger">
                                Can I sync the products manually with Zettle?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion7">
                            <p>
                                If you do not want to sync the products automatically, you can use a manual mode.
                            </p>

                            <p>
                                Go to “Settings” -> “advanced settings” and change the “sync mode” to “manual”. This mode adds a tab “Changes” to the module navigation. Product changes are collected by the module and can be synced with Zettle manually. This mode should be used, if you want to control the data that is synced with Zettle.
                            </p>

                            <p>
                                To sync the collected changes to Zettle, click “START SYNC NOW”. Updated product quantity and prices from PrestaShop will now be synchronized with Zettle.
                            </p>

                        </dd>

                        <dt>
                            <a href="#accordion8" class="accordion-title accordionTitle js-accordionTrigger">
                                The synchronization does not work
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion8">
                            <p>
                                Please do not try to sync while your shop is in maintenance mode. Turn of maintenance mode and try again.
                                Make sure, your PrestaShop is using SSL and all pages are using https. You enable SSL in your PrestaShop back office.
                            </p>

                        </dd>

                        <dt>
                            <a href="#accordion9" class="accordion-title accordionTitle js-accordionTrigger">
                                Which product data is synchronized between Zettle and PrestaShop?
                            </a>
                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion9">
                            <p>
                                The product details, product quantity and product price are synched between your Zettle account and PrestaShop. If you sell a product via Zettle or change the quantity manually, your stock is reduced and will show the same quantity on Zettle and PrestaShop. The same is true, ff you change the product description or the price, the Zettle and PrestaShop will be updated.
                            </p>

                        </dd>
                    </dl>
                </div>

            </div>
        </div>
    </div>
</div>