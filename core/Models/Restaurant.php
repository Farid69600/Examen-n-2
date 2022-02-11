<?php

namespace Models;


class Restaurant extends AbstractModel implements \JsonSerializable
{
    protected string $nomDeLaTable = "restaurants";

    private $id;
    private $name;
    private $address;
    private $city;



    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return ["id"=>$this->id,
            "name" => $this->name,
            "address" => $this->address,
            "city" => $this->city,
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function save(Restaurant $restaurant)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
        (name, address, city) VALUE  (:name, :address, :city)"
        );
        $sql->execute([
            "name"=>$restaurant->name,
            "address"=>$restaurant->address,
            "city"=>$restaurant->city,
        ]);

    }

}