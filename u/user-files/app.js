window.addEventListener("load", () => {

  let long;
  let lat;
  let tempratureDescription = document.querySelector('.temprature-description');
  let tempratureDegree = document.querySelector('.temprature-degree');
  let locationTimezone = document.querySelector('.location-timezone');
  let PressureDescription = document.querySelector('.pressure');
  let iconDescription = document.querySelector('.icon');
  let visablity = document.querySelector('.visiable');

  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(position =>{

      long = position.coords.longitude;
      lat = position.coords.latitude;

      const proxy = "https://cors-anywhere.herokuapp.com/";
      const api = `${proxy}https://api.darksky.net/forecast/8da284556fe8b52d4386c0ae3e82c10f/${lat},${long}`;
      
      fetch(api)
        .then(response => {
          return response.json();
      })
      .then(data => {
        console.log(data);
        const {pressure , temperature} = data.currently;
        const {summary} = data.hourly;
        const {icon} = data.daily;
        const {visibility} = data.currently;
          // Set DOM Elements from the API
          tempratureDegree.textContent = temperature;
          tempratureDescription.textContent = summary;
          locationTimezone.textContent = data.timezone;
          PressureDescription.textContent = pressure; 
          iconDescription.textContent = icon;
          visablity.textContent = visibility;
         });
    });

  }
 
});

