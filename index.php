<?php
// [abstract] Personnage (variables):
// - nom (string)
// - dateDeCreation (\DateTime)
// - phyPower (int) (0-100)
// - magPower (int) (0-100)
// - armor (int) (0-100)
// - escape (int) (0-100) // chance to escape // rogue.escape = 95 // warrior.escape = 50 => mt_rand(0,  (escape - 100))
// - life (int) (0-100)
// - mana (int) (0-100)
// - classe (string) : guerrier, mage, voleur, archer, ....
abstract class Personnage {
    protected string $name;
    protected DateTime $dateDeCreation;
    protected int $phyPower;
    protected int $magPower;
    protected int $armor;
    protected int $escape;
    protected int $life;
    protected int $mana;
    protected ?Weapon $weapon;
    protected ?Shield $shield;
    protected Bag $inventory;

    protected string $classe;

    public function __construct(
        string $name,
        string $classe
    ){
        $this->name = $name;
        $this->dateDeCreation = new DateTime();
        $this->phyPower = 10;
        $this->magPower = 10;
        $this->armor = 10/2;
        $this->escape = 10;
        $this->life = 10*2;
        $this->mana = 10*2;
        $this->inventory = new Bag();
        $this->classe = $classe;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): Personnage
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhyPower(): int
    {
        return $this->phyPower;
    }

    /**
     * @param int $phyPower
     */
    public function setPhyPower(int $phyPower): Personnage
    {
        $this->phyPower = $phyPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagPower(): int
    {
        return $this->magPower;
    }

    /**
     * @param int $magPower
     */
    public function setMagPower(int $magPower): Personnage
    {
        $this->magPower = $magPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor(int $armor): Personnage
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return int
     */
    public function getEscape(): int
    {
        return $this->escape;
    }

    /**
     * @param int $escape
     */
    public function setEscape(int $escape): Personnage
    {
        $this->escape = $escape;

        return $this;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     */
    public function setLife(int $life): Personnage
    {
        $this->life = $life;

        return $this;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     */
    public function setMana(int $mana): Personnage
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return string
     */
    public function getClasse(): string
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse(string $classe): Personnage
    {
        $this->classe = $classe;

        return $this;
    }
    public function useItem(Items $item) {

    }
    // TODO - [public] useItem(Item $item) => if item.equipable === false

    public function EquipItem (Items $item) {

    }
    // TODO - [public] equipItem (Item $item) => if item.equipable === true
    // TODO item is Shield : ($item === Shield && Personnage.weapon.isTwoHanded === false)
    // TODO item is weapon : ($item === Weapon) => si item.isTwoHanded === true => unequipItem($shield)
    // TODO - [public] unequipItem (Item $item) : deséquiper un item
    // TODO - [public] attackTarget(Personnage $target) : attaquer un personnage => code pour calculer les dégats et l'utilisation de mana
    // TODO $damage = [calcul des dmg];
    // TODO $target->receiveDamage($damage);
    // TODO [public] receiveDamage(int $damage) : recevoir des dégats => code pour calculer les dégats
    // TODO - [private] isDodged() : calculer si le personnage a esquivé l'attaque mt_rand(0,  (escape - 100)) === (escape - 100)
    // TODO - [public] isAlive() : vérifier si le personnage est en vie
    // TODO Personnage->useItem(Item $item)
    // TODO Personnage->equipItem(Item $item) -> if item.equipable === true
    // TODO Personnage->attackTarget(Personnage $target)
    /**
     * @return DateTime
     */
    public function getDateDeCreation(): DateTime
    {
        return $this->dateDeCreation;
    }

    /**
     * @param DateTime $dateDeCreation
     */
    public function setDateDeCreation(DateTime $dateDeCreation): Personnage
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    /**
     * @return Weapon|null
     */
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * @param Weapon|null $weapon
     */
    public function setWeapon(?Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /**
     * @return Shield|null
     */
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * @param Shield|null $shield
     */
    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }
}

class Bag {
    protected string $weapon;
    protected string $shield;

}

class Warrior extends Personnage  {

    public function __construct(string $name)
    {
        parent::__construct($name, 'Warrior');
        $this->setPhyPower(random_int(20, 40));
        $this->setMagPower(random_int(0, 10));
        $this->setEscape(random_int(0, 100));
    }

}
class Mage extends Personnage {

}
class Rogue extends Personnage {

}
abstract class Foe extends Personnage {
// TODO nom random, stats random
// TODO Foe : bat|zombie|orc|gobelin|squelette
// TODO each Foe override attackTarget(Personnage $target) => code pour calculer les dégats et l'utilisation de mana

}
abstract class Items {
// TODO - name (string)
// TODO - description (string)
// TODO - equipable (bool)
// TODO - type (string) : weapon|shield|armor|potion|food|key|quest|misc
}
class Weapon extends Items {
// TODO - damage (int)
// TODO - isTwoHanded (bool)
// TODO - weaponClass (string) : sword|axe|dagger|bow|staff|wand|spear|hammer|fist
}
class Shield extends items {
// TODO - armor (int)
}
class Potion extends Items {
// TODO - const TYPE_HEAL = 'heal', TYPE_MANA = 'mana'
// TODO - amount (float)
// TODO - type (string)(self::TYPE_HEAL|self::TYPE_MANA)
// TODO - used (bool) (false)
}

$brutus = new Warrior("Brutus");

var_dump($brutus, '______________');


// Item > Weapon > Sword > LongSword
// Item > Weapon > Sword > GreatSword
// Item > Weapon > Staff > FireStaff
// Item > Shield > SmallShield
// Item > utility > Potion > HealthPotion
// Item > utility > Potion > ManaPotion

// Personnage->useItem(Item $item)
// Personnage->equipItem(Item $item) -> if item.equipable === true
// Personnage->attackTarget(Personnage $target)