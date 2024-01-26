function getAllCountries() {
    return fetch('https://restcountries.com/v3.1/all')
        .then((response) => response.json())
        .then((data) => data);
}

function putCountriesInSelect(countries, select) {
    countries.forEach((country) => {
        const option = document.createElement('option');
        option.value = country.translations.fra.common;
        option.textContent = country.translations.fra.common;
        select.appendChild(option);
    });
}

getAllCountries().then((countries) =>
    putCountriesInSelect(countries, document.getElementById('country'))
);

$(document).ready(function () {
    $('#country').select2();
});