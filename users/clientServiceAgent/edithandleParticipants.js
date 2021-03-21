let id = $("input[name*='event_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    console.log(textvalues);
    let eventname = $("input[name*='event_name']");
    let eventcategory = $("input[name*='event_category']");
    let eventhostingdate = $("input[name*='event_hosting_date']");
    let eventenddate = $("input[name*='event_end_date']");
    let eventvenue = $("input[name*='event_venue']");
    let eventprice = $("input[name*='event_price']");
    let eventparticipants =$("input[name*='event_participants']");
    let eventdescription = $("input[name*='event_description']");

    
    
    

	id.val(textvalues[0]);
    eventname.attr("readonly","readonly");
    eventname.val(textvalues[1]);
    eventparticipants.val(textvalues[7]); //" Can be edited by Client Service agent"
   
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}