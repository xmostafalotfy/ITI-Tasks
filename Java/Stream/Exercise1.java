

import java.util.Comparator;
import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;




public class Exercise1 {

   public static void main(String[] args) {
      CountryDao countryDao= InMemoryWorldDao.getInstance();

      List<City> s=countryDao.findAllCountries().stream()
                  .map(Country::getCities).map(cities -> cities.stream()
                  .max(Comparator.comparing(City::getPopulation)))
                  .filter(Optional::isPresent).map(city->city.get())
                  .collect(Collectors.toList());
                  
      System.out.println(s);
   }

}