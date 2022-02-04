//select the subjects related to the selected course 
function stuSelected(){
let stu=document.getElementById("stu");
stu=stu.options[stu.selectedIndex].value;
    $.ajax({
        type: 'POST',
        data: {stu:stu},
        url: 'addGradesBack.php' 
    }).done(function (result) {
        let allSub=JSON.parse(result);
        //console.log(allStu);
        subDiv.innerHTML="";
        subDiv.innerHTML+=` <label>Select Subject</label>
                            <select class="form-control" name="subject"  id="sub" onChange="subSelected()" >
                            <option></option>
                            </select>`;
        for(i=0;i<allSub.length;i++){
            sub.innerHTML+=`<option>` + allSub[i] + `</option>`;
        }
    }).fail(function () {
    alert("Something Went Wrong");
})

}

// Checking whether any data is there related to the student
function subSelected(){
    //let stu1 = stu.options[stu.selectedIndex].value;
    let stud=document.getElementById("stu");
    stud=stud.options[stud.selectedIndex].value;//alert(stud);
    let sub=document.getElementById("sub");
    sub=sub.options[sub.selectedIndex].value;//alert(stud);

    $.ajax({
        type: 'POST',
        //data:dataobject,
        data: {stud:stud,sub:sub},
        url: 'addGradesBack.php'
    }).done(function (result) {
        console.log(result);
        
            if(parseInt(result)!=0){
                //This save is actually update button
                markDiv.innerHTML="";
                markDiv.innerHTML+=`
                <label>Enter marks</label>
                <input class="form-control"  place-holder="Enter Marks" required name="marks">
                <br>
                <input class="btn btn-primary"  type="submit" name="btnUpd" value="Save">`;
            }else{        
                //This is the real save button   
                markDiv.innerHTML="";
                markDiv.innerHTML+=`
                <label>Enter marks</label>
                <input class="form-control"  place-holder="Enter Marks" required name="marks">
                <br>
                <input class="btn btn-primary"  type="submit" name="btnSub" value="Save">`
            }
    }).fail(function () {
        alert("Something Went Wrong");
    })


}

function nextStu(){
    let stud=document.getElementById("stu");
    stud=stud.options[stud.selectedIndex].value;
    const id = stud.split("/");
    alert(id[3]);
}
