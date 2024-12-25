import java.util.*;
import java.util.stream.*;

public class Exercise5 {

    public static void main(String[] args) {
        CountryDao countryDao = InMemoryWorldDao.getInstance();
        CityDao cityDao = InMemoryWorldDao.getInstance();

        City mostPopulatedCapital = countryDao.findAllCountries()
            .stream()
            .mapToInt(country -> country.getCapital())  
            .mapToObj(cityId -> cityDao.findCityById(cityId))  
            .filter(Objects::nonNull)  
            .max(Comparator.comparing(City::getPopulation)).get();  

        System.out.println("Most populated capital: " + mostPopulatedCapital.getName());
    
    }
}
