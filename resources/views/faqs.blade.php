@include('header')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="container">

        <div class="row">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>FAQs</h4>
            </div>


            <div class="container-fluid animated animatedFadeInUp fadeInUp animation-delay2">

                <div class="row pb-4">
                    <b>Frequently Asked Questions (FAQs) :</b>
                </div>


                <details>
                    <summary>What is the use / purpose of this Application ?</summary> <br>
                    <p>
                        - This Web Application is based on Inventory Management and is used for business purpose such as
                        Ecommerce, Wholesale & Retail to maintain track of products that are stored in Shops & Warehouses.
                    </p>
                </details>

                <br>

                <details>
                    <summary>What are the features of this Application ?</summary> <br>

                    <ul>
                        <li> Track of different data - Stock Overview, Monthwise Sale, Invoice Generated, Total Stock cost, Pending Amount from Client & Out of Stock Products - on Dashboard for your ease</li>
                        <li> Add, Update / Edit, Delete Products </li>
                        <li> Add, Update / Edit, Delete Clients </li>
                        <li> Create Invoice with auto-calculation feature & pre-filled data from Products List</li>
                        <li> Custom Invoice feature to create invoice with your own seperate data other than product list </li>
                        <li> Data Backup in CSV / Excel file format of all your data, that is stored in this application </li>
                        <li> Works Offline for you to work uninterruptedly without internet connection </li>
                        <li> Application can be accessed from anywhere if hosted on online server </li>
                        <li> Works faster </li>
                        <li> Multiple users can store their data in their accounts </li>
                        <li> Data security with Login functionality </li>
                    </ul>

                </details>

                <br>

                <details>
                    <summary> What is Stock Count Pie Chart on Dashboard ? </summary> <br>

                    <p>
                        - It displays the count of products that are In-Stock, Low on Stock (products below 11 qnty) & Out-of-Stock Products.
                    </p>

                </details>

                <br>

                <details>
                    <summary> What is Total Sale Graph on Dashboard ? </summary> <br>

                    <p>
                        - It displays total Sale achieved from generated invoice and is calculated for each month of the current year, for your ease.
                    </p>

                </details>

                <br>

                <details>
                    <summary> How do I change my Address & other details that is pre-filled in Invoice ? </summary> <br>

                    <p>
                        - For <b>Create Invoice</b>, you can change address details from <b>My Account</b> option in the sidebar menu. But if you want to change it for current invoice, you can click on address line on invoice itself and edit it.
                    <br>
                        - For <b>Custom Invoice</b>, click on Address line on invoice and edit it.
                    </p>

                </details>

                <br>

                <details>
                    <summary> Tell me something about Invoice Generation ? </summary> <br>

                    <ol>
                        <li> <b>Create Invoice</b> - This allows you to create invoice with all those products you have in your stock,
                            and it also deducts those quantity from stocks after you generate invoice.
                        </li>
                        <li> <b>Custom Invoice</b> - This allows you to create invoice for your stock that is not entered in this
                                inventory application, this doe not affect your stock.

                        </li>
                    </ol>

                </details>



            </div>
        </div>

    </div>
</main>

