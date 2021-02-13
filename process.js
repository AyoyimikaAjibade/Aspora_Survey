$(document).ready(function() {
   $('h2').click(function () {
      var hid = event.target.id;
    /**
     * Pre the page for display of modal form when the headers are clicked
     */
      if (hid === 'recg_head') {
         $('#recgModal').toggle();
      }
      console.log(hid);
   });
})

// delete the Aspora Recognition rows by the question id
function deleteRecg(questionId) {
    if (confirm('Are you sure??')) {
        $.ajax({
            url: 'recognition.php',
            method: 'post',
            dataType: 'text',
            data: {
                key: 'deleteRecg',
                questionId: questionId
            }, success: function (response) {
                $("#question"+questionId).parent().remove();
                alert(response);
                location.reload();
            }
        });
    }
};

// edit the Aspora Recognition rows by the question id
function editRecg(questionId){
    $.ajax({
        url : 'recognition.php',
        method: 'post',
        dataType: 'json',
        data:{
           key: 'getRecg',
           questionId: questionId
        },
       
        success: function(response){
            $('#editRecgId').val(questionId);
            $('#question_number').val(response.question_number);
            $('#survey_question').val(response.survey_question);
            $('#agree').val(response.agree);
            $('#disagree').val(response.disagree);
            $('#prefer_not_to_say').val(response.prefer_not_to_say);
            $('#recgModal').modal('show');

            /**
             * change the value of input to update and the button style whilst
             * updating the row with the updated data
             */
            $('#updateRecg').attr('value', 'Update').attr('class', "btn btn-dark").attr('onclick', "manageData('updateRecg')")
            alert(response)
        }
    })
}

// a dual fuction for both editing and deleting Aspora Recognition rows
function manageData(key){
       var question_number = $('#question_number')
       var survey_question = $('#survey_question')
       var agree = $('#agree')
       var disagree = $('#disagree')
       var prefer_not_to_say = $('#prefer_not_to_say')
       var editRecgId = $('#editRecgId')
       if(isNotEmpty(question_number) && isNotEmpty(survey_question) && isNotEmpty(agree) && isNotEmpty(disagree) && isNotEmpty(prefer_not_to_say))
        {
   
            $.ajax({
                url : 'recognition.php',
                method: 'post',
                dataType: 'text',
                data:{
                   key: key,
                   question_number: question_number.val(),
                   survey_question: survey_question.val(),
                   agree: agree.val(),
                   disagree: disagree.val(),
                   prefer_not_to_say: prefer_not_to_say.val(),
                   questionId: editRecgId.val()
                },
               
                success: function(response){
                    if(response != 'success')
                        alert(response)
                    else{
                        $("#question_"+editRecgId.val()).html(question_number.val())
                    }
                    $('#recgModal').modal('hide');
                    $('#updateRecg').attr('value', 'Save').attr('onclick', "manageData('addRecg')")
                    $('form').trigger('reset');
                    location.reload();
                }
            })
        }
   }

   //A validation to ensure no empty value while submitting data
   function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');
    return true;
}

  