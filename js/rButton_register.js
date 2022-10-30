function userTypeCheck() 
{   
   if(document.getElementById('dot-2').checked) 
   {
      document.getElementById('ifLensman').style.display = 'block';
      document.getElementById('ifLensman2').style.display = 'block';
      document.getElementById('ifLensman3').style.display = 'block';
      document.getElementById('id_type').disabled = false;
      document.getElementById('id_upload').disabled = false;
      document.getElementById('bLicense_upload').disabled = false;
   }
   else 
   {
      document.getElementById('ifLensman').style.display = 'none';
      document.getElementById('ifLensman2').style.display = 'none';
      document.getElementById('ifLensman3').style.display = 'none';
      document.getElementById('id_type').disabled = true;
      document.getElementById('id_upload').disabled = true;
      document.getElementById('bLicense_upload').disabled = true;
   }
}
