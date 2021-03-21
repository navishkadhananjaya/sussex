let id = $("input[name*='event_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);
    let eventname = $("input[name*='event_name']");
    let eventcategory = $("input[name*='event_category']");
    let eventhostingdate = $("input[name*='event_hosting_date']");
    let eventenddate = $("input[name*='event_end_date']");
    let eventvenue = $("input[name*='event_venue']");
    let eventprice = $("input[name*='event_price']");
    let eventparticipants =$("input[name*='event_participants']");
    let eventdescription = $("input[name*='event_description']");

    eventprice.attr("readonly","readonly");
    eventparticipants.attr("readonly","readonly");

    id.val(textvalues[0]);
    eventname.val(textvalues[1]);
    eventcategory.val(textvalues[2]);
    eventhostingdate.val(textvalues[3]);
    eventenddate.val(textvalues[4]);
    eventvenue.val(textvalues[5]);
    eventprice.val(textvalues[6]); //" Can be edited by finance manager"
    eventparticipants.val(textvalues[7]); //" Can be edited by Client Service agent"
    eventdescription.val(textvalues[8]);
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