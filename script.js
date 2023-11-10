
let getValueInput = (id)=>{
    return document.getElementById(id);
}

// initialState
let date;
let driverName;
let loaderName;
let sectorName;
let vehNo;
let tollTax;
let food;
let tyreP;
let trafficChallan;
let misc;
let total;
let givenAmount;
let receivableAmount;
let expenseDB = [];


let handleAllTotalValue = ()=>{
    $.ajax({
        url:"sum_all_total.php",
        type:"POST",
        data:{id:1},
        success:(data)=>{
            document.getElementById("showTotalValues").innerHTML = data;
        }
    }) ;
}
let handleSearchTotalValue = ()=>{

}

let showAllData = ()=>{
    $.ajax({
        url:'show_all_data.php',
        type:'POST',
        success:(data)=>{
            if(data)
            {
            getValueInput("show_data_exp").innerHTML = data;
            handleAllTotalValue();
            }
        }
    })
}

showAllData();

let emptyInput = ()=>{
    driverName = getValueInput("driverName").value="";
    loaderName = getValueInput("loaderName").value="";
    sectorName = getValueInput("sectorName").value="";
    vehNo = getValueInput("vehNo").value="";
    tollTax = getValueInput("tollTax").value="";
    food = getValueInput("food").value="";
    tyreP = getValueInput("tyreP").value="";
    trafficChallan = getValueInput("trafficChallan").value=""
    misc = getValueInput("misc").value="";
    total = getValueInput("total").value=""
    givenAmount = getValueInput("givenAmount").value=""
    receivableAmount = getValueInput("receivableAmount").value=""

}
let totalExpense = ()=>{
     tollTax = Number(getValueInput("tollTax").value);
     food = Number(getValueInput("food").value);
     tyreP = Number(getValueInput("tyreP").value);
     trafficChallan = Number(getValueInput("trafficChallan").value)
     misc = Number(getValueInput("misc").value);
     total =  tollTax + food + tyreP + trafficChallan + misc;
    getValueInput("total").value = total ;
}

let getReceivableAmount = ()=>{
        givenAmount = Number(getValueInput("givenAmount").value)
        receivableAmount = givenAmount-total;
        getValueInput("receivableAmount").value = receivableAmount;
}

let hundleSubmit = (e) =>{
     event.preventDefault();
     date = getValueInput("date").value;
     driverName = getValueInput("driverName").value;
     loaderName = getValueInput("loaderName").value;
     sectorName = getValueInput("sectorName").value;
     vehNo = getValueInput("vehNo").value;
     console.log(loaderName)
     let dataObjectExpense = {date, driverName, loaderName, sectorName, vehNo,tollTax,food,tyreP,trafficChallan,misc,total,givenAmount,receivableAmount}
     console.log(dataObjectExpense)
        $.ajax({
            url:"send_data.php",
            type:"POST",
            data:dataObjectExpense,
            success:(data)=>{
               if(data)
               {
                console.log(data)
                emptyInput()
                showAllData();
               }
            }
        })

}


let handleSearch = ()=>{
    let fromDate = getValueInput("fromDate").value;
    let toDate = getValueInput("toDate").value;
    let searchDriverName = getValueInput("searchDriverName").value;
    let searchSectorName = getValueInput("searchSectorName").value;
    let searchVehNo = getValueInput("searchVehNo").value;
    if(fromDate=="")
    {
      alert("براہ کرم پہلای تاریخ کا انتخاب لازمی کرے");
      return;
    }
    if(toDate=="")
    {
      alert("براہ کرم دوسری تاریخ کا انتخاب لازمی کرےے");
      return;
    }
    let sendSearchData = {fromDate,toDate,searchDriverName,searchSectorName,searchVehNo}

    $.ajax({
        url:"search_data.php",
        type:"POST",
        data:sendSearchData,
        success:(data)=>{
            getValueInput("show_data_exp").innerHTML = data;
            $.ajax({
                url:"sum_search_total.php",
                type:"POST",
                data:sendSearchData,
                success:(data)=>{

                    document.getElementById("showTotalValues").innerHTML = data;
                }
            })

        }
    });

}

let handleDelete = id=>{
    if(confirm("Are you sure delete this record?"))
    {
        $.ajax({
        url:"delete_data.php",
        type:"POST",
        data:{id:id},
        success:(data)=>{
            if(data==1)
            {
                alert("Delete Record Successfully!")
                showAllData();
            }
        }
    })
}
}


let handleEdit = id =>{
    $("#exampleModal").modal('show');
    console.log(id)
    $.ajax({
        url:"backend/edit_data.php",
        type:"POST",
        data:{id:id},
        success:(data)=>{
            getValueInput("showEditData").innerHTML = data
        }
    })
}

let handleUpdate = ()=>{
    const id = getValueInput('editId').value;
    const amount = getValueInput('editReceivableAmount').value;
    console.log(amount)
    $.ajax({
        url:"backend/update_data.php",
        type:"POST",
        data:{id,amount},
        success:(data)=>{
            if(data==1)
            {
                alert("Edit Successfully")
                showAllData()

            }
        }
    })
    $("#exampleModal").modal('hide');
}
