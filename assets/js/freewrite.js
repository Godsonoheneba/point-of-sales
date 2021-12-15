

 
/*--------------check for mobile enterd*/
function checkUsername(checkit) {

  var check = /[^0-9]/g;  
  checkit.value = checkit.value.replace(check, "");
}



/*--------------check for mobile enterd*/
function checkMobiles(checkit) {

  var check = /[^0-9]/g;  
  checkit.value = checkit.value.replace(check, "");
}


/*--------------check for price enterd*/
function checkPrice(checkit) {

  var check = /[^0-9.]/g;  
  checkit.value = checkit.value.replace(check, "");
}











////////////////////////////////updateStaffInfo/////////////////

function updateStaffInfo(tabID) {
  

	var username = $(".username").val();
	var fullname = $(".fullname").val();
	var mobile = $(".mobile").val();


	if (fullname!=="" &&  mobile!=="" && username!==""  ) {

		if (mobile.length <10 ) {

		Swal.fire({
	      title: "Error",
	      text: "Invalid mobile Number!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });

		} else {



			 Swal.fire({
		      title: 'Are you sure you want to Update ' + fullname + ' Info ? ',
		      text: "You won't be able to revert this!",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes, Update!'
		    }).then((result) => {


		      if (result.value) {


			        $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=updateStaffInfo",{fullname:fullname,mobile:mobile,tabID:tabID,username:username},function (showOutPut) {

			         if (showOutPut.includes("error")) {

			           Swal.fire({
			            title: "Error",
			            text: "An error occured, please try again later",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }

			         else{


			          Swal.fire(
			            'Successfull!',
			            ' Successfully Updated... ',
			            'success'
			            ).then((result) =>{


			              // window.location.replace("login");

			              location.reload();
			              



			            })

 

			          }


			        });

			      



		      }


		       });


		



			





		}

	} else {


		 Swal.fire({
	      title: "Error",
	      text: "All fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}





}







////////////////////////////////updateStaffInfo/////////////////

function changePassword(tabID) {
  

	var old_password = $(".old_password").val();
	var new_password = $(".new_password").val();


	if (old_password!=="" &&  new_password!=="") {

			 Swal.fire({
		      title: 'Are you sure you want to your password? ',
		      text: "You won't be able to revert this!",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes, Change Password!'
		    }).then((result) => {


		      if (result.value) {


			        $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=changePasswordPost",{old_password:old_password,new_password:new_password,tabID:tabID},function (showOutPut) {

			         if (showOutPut.includes("error")) {

			           Swal.fire({
			            title: "Error",
			            text: "An error occured, please try again later",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }else if (showOutPut.includes("passnotmatch")) {

			           Swal.fire({
			            title: "Error",
			            text: "Old password and new password does not match!!!",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }else{


			          Swal.fire(
			            'Successfull!',
			            ' Successfully Updated... ',
			            'success'
			            ).then((result) =>{


			              // window.location.replace("login");

			              location.reload();
			              



			            })

 

			          }


			        });

			      



		      }


		       });


		



			





		

	} else {


		 Swal.fire({
	      title: "Error",
	      text: "All fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}





}



 
















function bacupClick(){



			 Swal.fire({
		      title: 'Are you sure you want to Backup ',
		      text: "You won't be able to revert this!",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes, Backup!'
		    }).then((result) => {


		      if (result.value) {


							$.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=backupPost",{},function (showOutPut) {

								


			          Swal.fire(
			            'Successfull!',
			            ' Successfully Backuped',
			            'success'
			            ).then((result) =>{


			              location.reload(); 
			              



			            })

 

			          

							});


		      }


		       });


		



			

	



			      



		      
}

 


///////////////////////register///////////////////

function register() {


	var fullname = $(".fullname").val();
	var mobile = $(".mobile").val();
	var assign_role = $(".assign_role").val();
	var username = $(".username").val();
	var password = $(".password").val();
	var confirm_password = $(".confirm_password").val();

	if (fullname!=="" &&  mobile!=="" && assign_role!=="" && username!=="" &&  password!=="" &&  confirm_password!==""  ) {

		if (mobile.length <10 ) {

		Swal.fire({
	      title: "Error",
	      text: "Invalid mobile Number!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });

		} else {




			if (password!==confirm_password) {

				Swal.fire({
			      title: "Error",
			      text: "Password and confirm password should be the same!!!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      confirmButtonText: "Ok",
			      closeOnConfirm: false,
			      closeOnCancel: false

			    });



			} else {





			 Swal.fire({
		      title: 'Are you sure you want to Register ' + fullname + ' ? ',
		      text: "You won't be able to revert this!",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes, Register!'
		    }).then((result) => {


		      if (result.value) {


			        $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=registerStaff",{fullname:fullname,mobile:mobile,assign_role:assign_role,username:username,password:password},function (showOutPut) {

			          if (showOutPut.includes("no")) {
			            Swal.fire({
			              title: "error",
			              text: "Username already  Exist. Contact Administrator to confirm you!!!",
			              type: "warning",
			              confirmButtonClass: "btn-danger",
			              confirmButtonText: "Ok",
			              closeOnConfirm: false,
			              closeOnCancel: false

			            });



			          }else if (showOutPut.includes("yes")) {

			           Swal.fire({
			            title: "Error",
			            text: "Username already  Exist!!!! Try different Username",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }else if (showOutPut.includes("mobileexist")) {

			           Swal.fire({
			            title: "Error",
			            text: "Mobile Number already  Exist!!!! Try different Mobile Number",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }

			         else{


			          Swal.fire(
			            'Successfull!',
			            ' Successfully Registered. Kindly wait for Administrator to confirm you... ',
			            'success'
			            ).then((result) =>{


			              window.location.replace("login");
			              



			            })

 

			          }


			        });

			      



		      }


		       });


		



			}





		}

	} else {


		 Swal.fire({
	      title: "Error",
	      text: "All fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}


}








///////////////////////////ADD NEW STOCK/////////////

function addNewStock() {
	



	var Category = $(".Category").val();
	var subcategories = $(".subcategories").val();
	var price = $(".price").val();
	var quantity = $(".quantity").val();


	if (Category!=="" &&  subcategories!=="" && price!=="" && quantity!==""  ) {




			if (price<=0) {

				Swal.fire({
			      title: "Error",
			      text: "Price cannot be zero!!!!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      confirmButtonText: "Ok",
			      closeOnConfirm: false,
			      closeOnCancel: false

			    });
			} else if (quantity<=0) {

				Swal.fire({
			      title: "Error",
			      text: "Quantity cannot be zero!!!!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      confirmButtonText: "Ok",
			      closeOnConfirm: false,
			      closeOnCancel: false

			    });
			} else {


			 Swal.fire({
		      // title: 'Are you sure you want to Add a new  stock ' + Category + ' (  ' + subcategories + '  ) ?',
		      title: 'Are you sure you want to Add a new  stock ?',
		      text: "You won't be able to revert this!",
		      type: 'warning',
		      showCancelButton: true,
		      confirmButtonColor: '#3085d6',
		      cancelButtonColor: '#d33',
		      confirmButtonText: 'Yes, Add!'
		    }).then((result) => {


		      if (result.value) {


			        $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=addNewStock",{Category:Category,subcategories:subcategories,price:price,quantity:quantity},function (showOutPut) {


			        	// alert(showOutPut);



			        	  if (showOutPut.includes("ErroInsert")) {
			            Swal.fire({
			              title: "error",
			              text: "An error occured in adding new stock",
			              type: "warning",
			              confirmButtonClass: "btn-danger",
			              confirmButtonText: "Ok",
			              closeOnConfirm: false,
			              closeOnCancel: false

			            });



			          }else if (showOutPut.includes("ErroUpdate")) {

			           Swal.fire({
			            title: "Error",
			            text: "An error occured in adding new stock (Top  Up Stock ) ",
			            type: "warning",
			            confirmButtonClass: "btn-danger",
			            confirmButtonText: "Ok",
			            closeOnConfirm: false,
			            closeOnCancel: false

			          });


			         }

			         else{


			         	if (showOutPut.includes("topStock")) {


		         		   Swal.fire(
				            'Successfull!',
				            ' Stock added Successfully...(Top Up Stock)',
				            'success'
				            ).then((result) =>{


				              location.reload();
				              



				            })


			         	} else {


			         		Swal.fire(
				            'Successfull!',
				            ' Stock added Successfully...(New Stock)',
				            'success'
				            ).then((result) =>{


				              location.reload();
				              



				            })


			         	}


			       



			          }



			        });

			      



		      }


		       });


		



		}





		

	} else {


		 Swal.fire({
	      title: "Error",
	      text: "All fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}



}





/*---------------------------EDIT STOCK PRICE--------------*/
function changeStockPrice() {


  var stockID = $(".stockID").val();
  var NewPriceClass = $(".NewPriceClass").val();

  NewPriceClass = Number(NewPriceClass);


  if (NewPriceClass!=="" && stockID!=="") {

    if (NewPriceClass!==0 ) { 


      Swal.fire({
        title: 'Are you sure you want to change the price to GHC' + NewPriceClass + ' .00 ?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change Price!'
      }).then((result) => {


        if (result.value) {

          $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=editStockPrice",{stockID:stockID,NewPriceClass:NewPriceClass},function (showOutPut) {


            if (showOutPut.includes("empty")) {
              Swal.fire({
                title: "Error",
                text: "Amount filed cannot be empty",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else if (showOutPut.includes("editerror")) {

              Swal.fire({
                title: "Error",
                text: "An unknown error occured, Please try again later",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else{




			          Swal.fire(
			            'Successfull!',
			            ' Successfully Updated... ',
			            'success'
			            ).then((result) =>{



			              location.reload();
			              



			            })

 

			          
            }


            });

        }


      });


    } else {


     Swal.fire({
      title: "Error",
      text: "Payment Cannot be Zero!!!",
      type: "warning",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Ok",
      closeOnConfirm: false,
      closeOnCancel: false

    });


   }



 } else {

  Swal.fire({
    title: "Error",
    text: "Field is mandatory (*)",
    type: "warning",
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Ok",
    closeOnConfirm: false,
    closeOnCancel: false

  });
		}



}














///////////////////////////ADD NEW PURCHASE/////////////

function addNewPurchaseToCart(last_four_rand) {
	


	var Category = $(".Category").val();
	var subcategories = $(".subcategories").val();
	var quantity = $(".quantity").val();

	 var showCartListDiv = $(".showCartListDiv");


	if (Category!=="" &&  subcategories!=="" &&  quantity!==""  ) {

			if (quantity<=0) {

				Swal.fire({
			      title: "Error",
			      text: "Quantity cannot be zero!!!!",
			      type: "warning",
			      confirmButtonClass: "btn-danger",
			      confirmButtonText: "Ok",
			      closeOnConfirm: false,
			      closeOnCancel: false

			    });
		} else {


		      $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=addNewPurchaseToCart",{Category:Category,subcategories:subcategories,quantity:quantity,last_four_rand:last_four_rand},function (showOutPut) {


		      		// alert(showOutPut)
		      		// exit()
		        
				      if (showOutPut.includes("lessQty")) {


				       Swal.fire({
				        title: "Error",
				        text: "Remaining Quantity is less",
				        type: "warning",
				        confirmButtonClass: "btn-danger",
				        confirmButtonText: "Ok",
				        closeOnConfirm: false,
				        closeOnCancel: false

				      });



				     } else if (showOutPut.includes("noStock")) {


				       Swal.fire({
				        title: "Error",
				        text: "This item has not been stock!!! Stock before purchase",
				        type: "warning",
				        confirmButtonClass: "btn-danger",
				        confirmButtonText: "Ok",
				        closeOnConfirm: false,
				        closeOnCancel: false

				      });



				     }else if (showOutPut.includes("error")) {


				       Swal.fire({
				        title: "Error",
				        text: "An error Occured, Please refresh the page and try again",
				        type: "warning",
				        confirmButtonClass: "btn-danger",
				        confirmButtonText: "Ok",
				        closeOnConfirm: false,
				        closeOnCancel: false

				      });



				     }else {


				      $(".Category").val("");
				      $(".subcategories").val("");
				      $(".quantity").val("");


				      $(".paymentButDiv").show();

				      showCartListDiv.html(showOutPut);


				    }



		        });

		      






	}





		

	} else {


		 Swal.fire({
	      title: "Error",
	      text: "All fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}



}









/*-------------------------delete deleteFromCart ==================*/

function deleteFromCart(id,last_four_rand) {

  Swal.fire({
    title: 'Are you sure you want to Remove',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Remove!'
  }).then((result) => {


    if (result.value) {


      $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=deleteFromCrtPost",{id:id,last_four_rand:last_four_rand},function (showOutPut) {


        if (showOutPut.includes("errorinupdate")) {

         Swal.fire({
          title: "Error",
          text: "An error Occured, Please refresh the page and try again",
          type: "warning",
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ok",
          closeOnConfirm: false,
          closeOnCancel: false

        });

       } else {


        var showCartListDiv = $(".showCartListDiv");


          $(".Category").val("");
	      $(".subcategories").val("");
	      $(".quantity").val("");

        $(".paymentButDiv").show();


        showCartListDiv.html(showOutPut);





      }



    });

    }

  });


}











// *----------------------------------------------ADD CASH SALES PAYMENT-----------------------------*/

function cashSalespay(itemIDClass) {



  Swal.fire({
    title: 'Are you sure you want to Pay',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Add Pay!'
  }).then((result) => {

    if (result.value) {


      $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=cashSalesPayments",{itemIDClass:itemIDClass},function (showOutPut) {



        if (showOutPut.includes("erorininsertitem")) {

         Swal.fire({
          title: "Error",
          text: "An error Occured in insertion, Please refresh the page and try again",
          type: "warning",
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ok",
          closeOnConfirm: false,
          closeOnCancel: false

        });

       }else {



              Swal.fire(
                'Successfull!',
                ' Successfully ',
                'success'
                ).then((result) =>{

                  Swal.fire({
                    title: 'Print',
                    text: "Print Receipt",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                  }).then((result) => {


                    if (result.value) {


                   $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=printcashSalesReceipt",{itemIDClass:itemIDClass},function (showOutPut) {

                   	var w = window.open();
                    w.document.write(showOutPut.trim());
                    w.print();
                    w.close();



                      location.reload();

                    });



                    

                    
                    }else{

                      location.reload();
                      

                    }
                  })



                })




      

          


       }



    });

    }

  });


}








function creditSAleButClick(itemID) {
	
	$(".itemIDClass").val(itemID);
}





function creditSalesFinishPay() {
	
	var itemIDClass = $(".itemIDClass").val();
	var eCustomer = $(".eCustomer").val();
	var fullname = $(".fullname").val();
	var mobile = $(".mobile").val();
	var location = $(".location").val();
	var initial_amount = $(".initial_amount").val();


	if (initial_amount!=="" && (eCustomer!=="" || (fullname!=="" && mobile!=="" && location!=="") ) ) {






  Swal.fire({
    title: 'Are you sure you want to Credit this person? ',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Credit!'
  }).then((result) => {

    if (result.value) {
 

      $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=creditSalesPayments",{itemIDClass:itemIDClass,eCustomer:eCustomer,fullname:fullname,mobile:mobile,location:location,initial_amount:initial_amount},function (showOutPut) {


      	// alert(showOutPut)
      	// exit()



        if (showOutPut.includes("erorininsertitem")) {

         Swal.fire({
          title: "Error",
          text: "An error Occured in insertion, Please refresh the page and try again",
          type: "warning",
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ok",
          closeOnConfirm: false,
          closeOnCancel: false

        });

       }else {



              Swal.fire(
                'Successfull!',
                ' Successfully ',
                'success'
                ).then((result) =>{

                  Swal.fire({
                    title: 'Print',
                    text: "Print Receipt",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                  }).then((result) => {


                    if (result.value) {

  

                   $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=printcreditSalesReceipt",{itemIDClass:itemIDClass},function (showOutPut) {







                   	var w = window.open();
                    w.document.write(showOutPut.trim());
                    w.print();
                    w.close();

                    window.location.replace(".login-success.add-new-purchase-apps-products.java.css.js.app.xml");



                      location.reload();

                    });



                    }else{

                      location.reload();
                      

                    }
                  })



                })




      

          


       }



    });

    }

  });







	} else {


		Swal.fire({
	      title: "Error",
	      text: "Initial amount and customer details fields are mandatory!!!!",
	      type: "warning",
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Ok",
	      closeOnConfirm: false,
	      closeOnCancel: false

	    });


	}
}








/*---------------------------PAY LOANS--------------*/
function payDebt(getLoanID,getPersonID) {


  var payLoanAmountClass = $(".payLoanAmountClass").val();

  payLoanAmountClass = Number(payLoanAmountClass);


  if (payLoanAmountClass!=="" ) {

    if (payLoanAmountClass!==0 ) { 


      Swal.fire({
        title: 'Are you sure you want to pay GHC' + payLoanAmountClass + ' .00 ?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Pay Debt'
      }).then((result) => {

   
        if (result.value) {

          $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=payDebtsPost",{getLoanID:getLoanID,getPersonID:getPersonID,payLoanAmountClass:payLoanAmountClass},function (showOutPut) {



            if (showOutPut.includes("empty")) {
              Swal.fire({
                title: "Error",
                text: "Amount filed cannot be empty",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else if (showOutPut.includes("zeroamount")) {

              Swal.fire({
                title: "Error",
                text: "AN Amount paying cannot be zero",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else if (showOutPut.includes("balanceiszero")) {

              Swal.fire({
                title: "Error",
                text: "Payment Cannot be more than your current balance",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else if (showOutPut.includes("paymentErrors")) {

              Swal.fire({
                title: "Error",
                text: "An error occured, Please refresh the page and start again??",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            }else{


              Swal.fire(
                'Successfull!',
                ' Payment has been made.',
                'success'
                ).then((result) =>{

                  Swal.fire({
                    title: 'Print',
                    text: "Print Receipt",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                  }).then((result) => {


                    if (result.value) {



                   $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=printpaidDebtReceipt",{getLoanID:getLoanID},function (showOutPut) {


                   	var w = window.open();
                    w.document.write(showOutPut.trim());
                    w.print();
                    w.close();

                    window.location.replace(".login-success.add-new-purchase-apps-products.java.css.js.app.xml");



                      location.reload();

                    });



                    
                    


                    }else{

                      location.reload();
                      

                    }
                  })



                })




              }


            });

        }


      });


    } else {


     Swal.fire({
      title: "Error",
      text: "Payment Cannot be Zero!!!",
      type: "warning",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Ok",
      closeOnConfirm: false,
      closeOnCancel: false

    });


   }



 } else {

  Swal.fire({
    title: "Error",
    text: "Field is mandatory (*)",
    type: "warning",
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Ok",
    closeOnConfirm: false,
    closeOnCancel: false

  });
		}



}








/////////////////search sales by date//////////////
function searchSAlesByDate() {
	

	var fromDate = $(".fromDate").val();
	var toDate = $(".toDate").val();

		
		if (fromDate!=="" && toDate!=="") {

			        // $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=searchSalesByDAtePost",{fromDate:fromDate,toDate:toDate},function (showOutPut) {

			        // 	alert(showOutPut)


			        // });


			        // window.location.replace('.login-success.all-todays-sales-list-apps-products.java.css.js.app.xml.joerock.paydac&&Sales&&FROM='+fromDate + '&&TO='+toDate);

			        window.location.replace('homepage.php?CHECKER=VIEW_TODAY_SALES&&FROM='+fromDate + '&&TO='+toDate);


			        

			      



		      


		} else {

		}
}






/////////////////search PURCHASE by date//////////////
function searchPurcByDate() {
	

	var fromDate = $(".fromDate").val();
	var toDate = $(".toDate").val();
 
		
		if (fromDate!=="" && toDate!=="") {

			    
			        window.location.replace('homepage.php?CHECKER=VIEW_PURCHASE&&FROM='+fromDate + '&&TO='+toDate);


		} else {

		}
}




/////////////////search paid debts by date//////////////
function searchPaidDebtByDate() {
	

	var fromDate = $(".fromDate").val();
	var toDate = $(".toDate").val();
 
		
		if (fromDate!=="" && toDate!=="") {

			    
			        window.location.replace('homepage.php?CHECKER=VIEW_ALL_PAID_DEBTS&&FROM='+fromDate + '&&TO='+toDate);


		} else {

		}
}