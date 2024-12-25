import java.util.Comparator;
import java.util.Optional;
import java.util.*;
import java.util.stream.*;



public class Exercise2 {

    public static void main(String[] args) {
      CountryDao countryDao = InMemoryWorldDao.getInstance();
     
      List<City> s=countryDao.findAllCountries().stream()
                  .map(Country::getCities).map(cities -> cities.stream()
                  .max(Comparator.comparing(City::getPopulation)))
                  .filter(Optional::isPresent).map(city->city.get())
                  .collect(Collectors.toList());


        List<City>s2=countryDao.getAllContinents()
        .stream()
        .map(Continent->s.stream()
        .filter(city->countryDao.findCountryByCode(city.getCountryCode()).getContinent().equals(Continent))
        .max(Comparator.comparing(City::getPopulation)))
        .filter(Optional::isPresent)
        .map(city->city.get())
        .collect(Collectors.toList());
        System.out.println(s2);
              }


}