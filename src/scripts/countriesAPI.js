function getAllCountries() {
    return fetch('https://restcountries.com/v3.1/all')
        .then((response) => response.json())
        .then((data) => {
            data.sort(function (a, b) {
                if (a.translations.fra.common < b.translations.fra.common) {
                    return -1;
                }
                if (a.translations.fra.common > b.translations.fra.common) {
                    return 1;
                }
                return 0;
            })

            return data;
        });
}

function putCountriesInSelect(countries, select) {
    countries.forEach((country) => {
        const option = document.createElement('option');
        option.value = country.translations.fra.common;
        option.textContent = country.translations.fra.common;
        if(country.translations.fra.common === "France") option.setAttribute("selected", "selected")
        select.appendChild(option);
    });
}

getAllCountries().then((countries) =>
    putCountriesInSelect(countries, document.getElementById('country'))
);

$(document).ready(function () {
    $('#country').select2();
});